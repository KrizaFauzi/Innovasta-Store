@extends('layouts.admin')
@section('content')

<!-- Text Tambah Produk -->
<div class="d-flex justify-content-between bg-white shadow-sm rounded-1 align-items-center py-2 px-3">
    <p class="fw-bold my-auto" style="font-size: 23px;">Tambah Kategori</p>
</div>
<!-- End Text Tambah Produk -->

<div class="bg-white shadow-sm rounded-1 p-3 mt-2">
    <form action="{{ url('/admin/category') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-0 g-lg-3 align-items-center">

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Nama Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <input type="text" name="name" class="form-control">
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Slug Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <input type="text" name="slug" class="form-control">
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Deskripsi Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <textarea class="form-control" name="description" rows="4"></textarea>
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Image Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Status Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <input type="checkbox" name="status">
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Meta Title Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <input type="text" name="meta_title" class="form-control">
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Meta Keyword Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Meta Description Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <textarea name="meta_description" class="form-control" rows="4"></textarea>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-info fw-semibold text-light px-4 shadow"
                    style="font-size: 15px;">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
