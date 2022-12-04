<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if($request->total == 0)
        {
            return redirect()->back()->with('error', 'Tidak ada barang');
        }
        return view('frontend.checkout.index');
    }
}
