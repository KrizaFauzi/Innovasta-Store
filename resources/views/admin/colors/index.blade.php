@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-between bg-white shadow-sm rounded-1 align-items-center py-2 px-3 mb-3">
    <p class="fw-bold my-auto" style="font-size: 23px;">Daftar Warna</p>
    <a href="{{ url('admin/colors/create') }}" class="btn btn-info shadow fw-semibold text-white btn-sm">
        <span><i class="fa-solid fa-plus me-2"></i></span>Tambah Warna
    </a>
</div>

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

<div class="bg-white shadow-sm rounded-1 mt-3">
    <table class="table">
        <thead>
            <tr>
                <th width="50px" scope="col">No</th>
                <th scope="col">Color Name</th>
                <th scope="col">Color Code</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($colors as $item)
            <tr>
                <th scope="row">
                    {{ $item->id }}
                </th>
                <td>
                    {{ $item->name }}
                </td>
                <td>
                    {{ $item->code }}
                </td>
                <td>
                    {{ $item->status ? 'Hidden':'Visible' }}
                </td>
                <td>
                    <a href="{{ url('admin/colors/'.$item->id.'/edit') }}"
                        class="btn btn-sm btn-primary shadow mr-2 mb-2">
                        Edit
                    </a>
                    <a href="{{ url('admin/colors/'.$item->id.'/delete') }}"
                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                        class="btn btn-sm btn-danger shadow mb-2">
                        Hapus
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No Colors Available</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
