<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $product, $totalPrice = 0;

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->quantity > 1)
            {
                $cartData->decrement('quantity');
                session()->flash('message','Quantity Updated');
            } else {
                session()->flash('message','Quantity cannot be less than 1');
            }

        } else {
            session()->flash('message','Something Went Wrong!');
        }
    }

    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->productColor()->where('id',$cartData->product_color_id)->exists())
            {
                $productColor = $cartData->productColor()->where('id',$cartData->product_color_id)->first();
                if($productColor->quantity > $cartData->quantity)
                {
                    $cartData->increment('quantity');
                    session()->flash('message','Quantity Updated');
                } else {
                    session()->flash('message','Only ' .$productColor->quantity. ' Quantity Available' );
                }
            } else {
                if($cartData->product->quantity > $cartData->quantity)
                {
                    $cartData->increment('quantity');
                    session()->flash('message','Quantity Updated');
                } else {
                    session()->flash('message','Only ' .$cartData->product->quantity. ' Quantity Available' );
                }
            }

        } else {
            session()->flash('message','Something Went Wrong!');
        }
    }

    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id',$cartId)->first();
        if($cartRemoveData)
        {
            $cartRemoveData->delete();

            $this->emit('CartAddedUpdated');
            session()->flash('message','Cart Item Removed Successfully');
        } else {
            session()->flash('message','Something Went Wrong!');
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}
