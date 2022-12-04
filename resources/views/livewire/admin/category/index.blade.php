<div class="d-flex justify-content-between bg-white shadow-sm rounded-1 align-items-center py-2 px-3">
    <p class="fw-bold my-auto" style="font-size: 23px;">Daftar Kategori</p>
    <a href="{{ url('admin/category/create') }}" class="btn btn-info fw-semibold shadow text-white btn-sm">
        <span><i class="fa-solid fa-plus me-2"></i></span>Tambah Kategori
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
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">
                    {{ $no++ }}
                </th>
                <td>
                    {{ $category->name }}
                </td>
                <td>
                    {{ $category->status == '1' ? 'Hidden':'Visible' }}
                </td>
                <td>
                    <a href="{{ url('admin/category/'.$category->id.'/edit') }}"
                        class="btn btn-sm btn-primary shadow mr-2 mb-2">
                        Edit
                    </a>
                    <a href="/admin/category/{{$category->id}}"
                        onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                        class="btn btn-danger btn-sm shadow mr-2 mb-2">Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $categories->links() }}
    </div>
</div>

@push('script')

@endpush
