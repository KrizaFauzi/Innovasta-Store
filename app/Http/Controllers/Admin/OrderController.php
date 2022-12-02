<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceOrderMailable;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        //$todayDate = Carbon::now();
        //$orders = Order::whereDate('created_at', $todayDate)->paginate(10);

        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function ($q) use ($request) {

                            return $q->whereDate('created_at', $request->date);
                        }, function ($q) use ($todayDate) {

                            return $q->whereDate('created_at', $todayDate);
                        })
                        ->when($request->status != null, function ($q) use ($request) {

                            return $q->where('status_message',$request->status);
                        })
                        ->paginate(10);
        
        return view('seller.orders.index', compact('orders'));
    }

    public function show(int $orderId)
    {
        $order = Order::where('id',$orderId)->first();
        if($order){
            return view('seller.orders.view', compact('order'));
        } else {
            return redirect('seller/orders')->with('message', 'Order Id not found');
        }
    }

    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id',$orderId)->first();
        if($order){

            $order->update(['status_message' => $request->order_status]);
            return redirect('seller/orders/'.$orderId)->with('message','Order Status Updated');
        } else {

            return redirect('seller/orders'.$orderId)->with('message','Order Id not found');
        }
    }

    public function viewInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('seller.invoice.generate-invoice', compact('order'));
    }

    public function generateInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];

        $pdf = Pdf::loadView('seller.invoice.generate-invoice', $data);

        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-'.$orderId.'-'.$todayDate.'.pdf');
    }

    public function mailInvoice(int $orderId)
    {
        try{
            $order = Order::findOrFail($orderId);

            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            return redirect('seller/orders/'.$orderId)->with('message','Invoice Mail has been sent to '.$order->email);
        } catch(\Exception $e) {
            return redirect('seller/orders/'.$orderId)->with('message','Something went wrong');
        }
    }
}
