@extends('layouts.seller')
@section('title', 'My Order Details')
@section('content')

<!-- Text Tambah Produk -->
<div class="d-flex justify-content-between bg-white shadow-sm rounded-1 align-items-center py-2 px-3">
    <p class="fw-bold my-auto" style="font-size: 23px;">My Order Details</p>
</div>
<!-- End Text Tambah Produk -->

@if (session('message'))
<div class="toast-container position-fixed top-auto end-0 p-3">
    <div id="liveToast" class="toast show border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <div class="bg-info rounded me-2 shadow-sm" style="padding: 11px;"></div>
            <strong class="me-auto">GoodFance Bag</strong>
            {{-- <small>11 mins ago</small> --}}
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-white rounded">
            {{ session('message') }}
        </div>
    </div>
</div>
@endif

<div class="bg-white shadow-sm rounded-1 p-3 mt-2">

    <h4 class="text-primary">
        <i class="fa-solid fa-cart-shopping text-dark"></i> My Order Details
        <a href="{{ url('seller/orders') }}" class="btn btn-danger btn-sm float-end mx-1 shadow">
            Back
        </a>
        <a href="{{ url('seller/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm float-end mx-1 shadow">
            Download Invoice
        </a>
        <a href="{{ url('seller/invoice/'.$order->id) }}" target="_blank" class="btn btn-warning btn-sm float-end mx-1 shadow">
            View Invoice
        </a>
        <a href="{{ url('seller/invoice/'.$order->id.'/mail') }}" class="btn btn-info btn-sm float-end mx-1 shadow">
            Send Invoice Via Mail
        </a>
    </h4>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <h5>Order Details</h5>
            <hr>
            <h6>Order Id: {{ $order->id }}</h6>
            <h6>Tracking Id/No: {{ $order->tracking_no }}</h6>
            <h6>Ordered Date: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
            <h6>Payment Mode: {{ $order->payment_mode }}</h6>
            <h6 class="border p-2 text-success">
                Order Status Message: <span class="text-uppercase">{{ $order->status_message }}</span>
            </h6>
        </div>

        <div class="col-md-6">
            <h5>User Details</h5>
            <hr>
            <h6>Full Name: {{ $order->fullname }}</h6>
            <h6>Email Id: {{ $order->email }}</h6>
            <h6>Phone: {{ $order->phone }}</h6>
            <h6>Address: {{ $order->address }}</h6>
            <h6>Pin code: {{ $order->pincode }}</h6>
        </div>
    </div>

    <br>
    <h5>Order Items</h5>
    <hr>
    <div class="bg-white shadow-sm rounded-1 mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Item ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalPrice = 0;
                @endphp
                @foreach ($order->orderItems as $orderItem)
                <tr>
                    <td width="10%">{{ $orderItem->id }}</td>
                    <td width="10%">
                        @if ($orderItem->product->productImages)
                        <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                            style="width: 50px; height: 50px" alt="">
                        @else
                        <img src="" style="width: 50px; height: 50px" alt="">
                        @endif
                    </td>
                    <td>
                        {{ $orderItem->product->name }}

                        @if ($orderItem->productColor)
                        @if ($orderItem->productColor->color)
                        <span>- Color: {{ $orderItem->productColor->color->name }}</span>
                        @endif
                        @endif
                    </td>
                    <td width="10%">${{ $orderItem->price }}</td>
                    <td width="10%">{{ $orderItem->quantity }}</td>
                    <td width="10%" class="fw-bold">${{ $orderItem->quantity * $orderItem->price }}</td>
                    @php
                    $totalPrice += $orderItem->quantity * $orderItem->price;
                    @endphp
                </tr>
                @endforeach
                <tr>
                    <td colspan="5" class="fw-bold">Total Amount:</td>
                    <td colspan="1" class="fw-bold">${{ $totalPrice }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="card">
        <div class="card-body">
            <h4>Order Process (Order Status Updated)</h4>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <form action="{{ url('seller/orders/'.$order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label>Update Your Order Status</label>
                        <div class="input-group">
                            <select name="order_status" class="form-select">
                                <option value="">Select Order Status</option>
                                <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }} >In Progress</option>
                                <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }} >Completed</option>
                                <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }} >Pending</option>
                                <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':'' }} >Cancelled</option>
                                <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }} >Out for Delivery</option>
                            </select>
                            <button type="submit" class="btn btn-primary text-white">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7">
                    <br>
                    <h4 class="mt-3">Current Order Status: <span class="text-uppercase">{{ $order->status_message }}</span> </h4>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
