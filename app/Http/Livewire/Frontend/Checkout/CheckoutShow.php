<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount = 0;

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    protected $listeners = [
        'validationForAll',
        'transactionEmit' => 'paidOnlineOrder'
    ];

    public function paidOnlineOrder($value)
    {
        $this->payment_id = $value;
        $this->payment_mode = 'Paid by Paypal';

        $codOrder = $this->placeOrder();
        if($codOrder){

            Cart::where('user_id', auth()->user()->id)->delete();
            
            try{
                $order = Order::findOrFail($codOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
                //Mail sent successfully
            } catch(\Exception $e){
                //Something went wrong
            }

            session()->flash('message','Order Placed Successfully');
            return redirect()->to('thank-you');
        } else {
            session()->flash('message','Something went wrong');
        }
    }

    public function validationForAll()
    {
        $this->validate();
    }

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:12|min:10',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder()
    {
        $this->validate();

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'FFR-'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);

        foreach ($this->carts as $cartItem)
        {
            if($cartItem->product->selling_price != NULL) {
                $orderItems = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'product_color_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->selling_price,
                ]);
            } else {
                $orderItems = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'product_color_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->original_price,
                ]);
            }

            if($cartItem->product_color_id != NULL){
                $cartItem->productColor()->where('id',$cartItem->product_color_id)->decrement('quantity',$cartItem->quantity);
            } else {
                $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity',$cartItem->quantity);
            }
        }
        return $order;
    }

    public function codOrder()
    {
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();
        if($codOrder){

            Cart::where('user_id', auth()->user()->id)->delete();
            
                $order = Order::findOrFail($codOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
                //Mail sent successfully
            
            session()->flash('message','Order Placed Successfully');
            return redirect()->to('thank-you');
        } else {
            session()->flash('message','Something went wrong');
        }
    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem)
        {
            if(!$cartItem->product->selling_price){
                $this->totalProductAmount += $cartItem->product->original_price * $cartItem->quantity;
            }
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }

    public function paymentPost(Request $request) {
        $json = json_decode($request->get('json'));
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->tracking_no = 'FFR-'.$json->transaction_id;
        $order->fullname = $this->fullname;
        $order->email = $this->email;
        $order->phone = $this->phone;
        $order->pincode = $this->pincode;
        $order->address = $this->address;
        $order->status_message = $json->status_message;
        $order->payment_mode = $json->payment_type;
        $order->payment_id = $json->order_id;

        return $order->save() ? redirect(url('thank-you'))->with('message','Order Placed Successfully') : redirect(url('checkout'))->with('message','Something went wrong');
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        
        $this->phone = auth()->user()->userDetail->phone ?? '';
        $this->pincode = auth()->user()->userDetail->pin_code ?? '';
        $this->address = auth()->user()->userDetail->address ?? '';

        $this->totalProductAmount = $this->totalProductAmount();
        
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-9MvnichSpdo5ABgfKekFaH1F';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $this->totalProductAmount,
            ),
            'customer_details' => array(
                'first_name' => 'Kepada',
                'last_name' => $this->fullname,
                'email' => $this->email,
                'phone' => $this->phone,
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount,
            'snap_token' => $snapToken
        ]);
    }
}
