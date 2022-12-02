@extends('layouts.seller')
@section('content')

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

<div class="d-flex justify-content-between bg-white shadow-sm rounded-1 align-items-center py-2 px-3 mb-3">
    <p class="fw-bold my-auto" style="font-size: 23px;">Daftar Produk Anda</p>
    <a href="{{ url('seller/products/create') }}" class="btn btn-info shadow fw-semibold text-white btn-sm">
        <span><i class="fa-solid fa-plus me-2"></i></span>Tambah Produk
    </a>
</div>

<div class="bg-white shadow-sm rounded-1 mt-3">
    <table class="table">
        <thead>
            <tr>
                <th width="50px" scope="col">No</th>
                <th scope="col">Category</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <th scope="row">
                        {{ $product->id }}
                    </th>
                    <td>
                        @if ($product->category)
                            {{ $product->category->name }}
                        @else
                            No Category
                        @endif
                    </td>
                    <td>
                        {{ $product->name }}
                    </td>
                    <td>
                        @if($product->selling_price != null)
                            {{ $product->selling_price }}
                        @else
                            {{ $product->original_price }}
                        @endif
                    </td>
                    <td>
                        {{ $product->quantity }}
                    </td>
                    <td>
                        {{ $product->status == '1' ? 'Hidden':'Visible' }}
                    </td>
                    <td>
                        <a href="{{ url('seller/products/'.$product->id.'/edit') }}" class="btn btn-sm btn-primary shadow mr-2 mb-2">
                            Edit
                        </a>
                        <a href="{{ url('seller/products/'.$product->id.'/delete') }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger shadow mb-2">
                            Hapus
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No Products Available</td>
                </tr>
            @endforelse

        </tbody>
    </table>
    <div>
        {{ $products->links() }}
    </div>
</div>

@endsection
