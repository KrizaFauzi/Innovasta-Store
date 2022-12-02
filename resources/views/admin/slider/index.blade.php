@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-between bg-white shadow-sm rounded-1 align-items-center py-2 px-3 mb-3">
    <p class="fw-bold my-auto me-2 me-lg-0" style="font-size: 23px;">Carousel/Slideshow</p>
    <a href="{{ url('admin/sliders/create') }}" class="btn btn-info fw-semibold shadow text-white btn-sm">
        <span><i class="fa-solid fa-plus me-2"></i></span>Tambah Carousel
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
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sliders as $slider)
            <tr>
                <th scope="row">
                    {{ $slider->id }}
                </th>
                <td>
                    {{ $slider->title }}
                </td>
                <td>
                    {{ $slider->description }}
                </td>
                <td>
                    <img src="{{ asset("$slider->image") }}" style="width: 70px; height: 70px;" alt="Slider">
                </td>
                <td>
                    {{ $slider->status == '0' ? 'Visible':'Hidden' }}
                </td>
                <td>
                    <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}"
                        class="btn btn-sm btn-primary shadow mb-2">
                        Edit
                    </a>
                    <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}"
                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                        class="btn btn-sm btn-danger shadow mb-2">
                        Hapus
                    </a>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="7">No Sliders Available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
