@extends('layouts.admin')
@section('content')

<!-- Text Tambah Produk -->
<div class="d-flex justify-content-between bg-white shadow-sm rounded-1 align-items-center py-2 px-3">
    <p class="fw-bold my-auto" style="font-size: 23px;">Edit Kategori</p>
</div>
<!-- End Text Tambah Produk -->

<div class="bg-white shadow-sm rounded-1 p-3 mt-2">
    <form action="{{ url('/admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-0 g-lg-3 align-items-center">

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Nama Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Slug Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Deskripsi Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <textarea class="form-control" name="description" rows="4">{{ $category->description }}</textarea>
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Image Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <input type="file" name="image" class="form-control">
                <img src="{{ asset('/uploads/category/'.$category->image) }}" width="60px" height="60px;"/>
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Status Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked':'' }}>
                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Meta Title Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control">
                @error('meta_title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Meta Keyword Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <textarea name="meta_keyword" class="form-control" rows="4">{{ $category->meta_keyword }}</textarea>
                @error('meta_keyword') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6 col-md-2">
                <label class="col-form-label fw-semibold" style="font-size: 15px;">
                    Meta Description Kategori
                </label>
            </div>
            <div class="col-sm-6 col-md-10">
                <textarea name="meta_description" class="form-control" rows="4">{{ $category->meta_description }}</textarea>
                @error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-info fw-semibold text-light px-4 shadow"
                    style="font-size: 15px;">
                    Update
                </button>
            </div>
        </div>
    </form>
</div>

@endsection
