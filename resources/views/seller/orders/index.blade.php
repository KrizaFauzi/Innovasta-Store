@extends('layouts.seller')
@section('title', 'My Orders')
@section('content')

<!-- Text Tambah Produk -->
<div class="d-flex justify-content-between bg-white shadow-sm rounded-1 align-items-center py-2 px-3">
    <p class="fw-bold my-auto" style="font-size: 23px;">My Orders</p>
</div>
<!-- End Text Tambah Produk -->

<div class="bg-white shadow-sm rounded-1 p-3 mt-2">
    <form action="" method="GET">
        <div class="row">
            <div class="col-md-3">
                <label>Filter by Date</label>
                <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Filter by Status</label>
                <select class="form-control" name="status">
                    <option value="">Select All Status</option>
                    <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }} >In Progress</option>
                    <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }} >Completed</option>
                    <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }} >Pending</option>
                    <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':'' }} >Cancelled</option>
                    <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }} >Out for Delivery</option>
                </select>
            </div>
            <div class="col-md-6">
                <br>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Tracking No</th>
                <th scope="col">Username</th>
                <th scope="col">Payment Mode</th>
                <th scope="col">Ordered Date</th>
                <th scope="col">Status Message</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->tracking_no }}</td>
                <td>{{ $item->fullname }}</td>
                <td>{{ $item->payment_mode }}</td>
                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                <td>{{ $item->status_message }}</td>
                <td>
                    <a href="{{ url('seller/orders/'.$item->id) }}" class="btn btn-primary btn-sm shadow">View</a>
                </td>
                @empty
            <tr>
                <td colspan="7">No Orders Available</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div>
        {{ $orders->links() }}
    </div>
</div>

@endsection
