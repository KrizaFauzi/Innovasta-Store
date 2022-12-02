<div>

    @include('livewire.admin.brand.modal-form')

    <div class="d-flex justify-content-between bg-white shadow-sm rounded-1 align-items-center py-2 px-3">
        <p class="fw-bold my-auto" style="font-size: 23px;">Daftar Brand</p>
        <a href="" data-bs-toggle="modal" data-bs-target="#addBrandModal"
            class="btn btn-info fw-semibold shadow text-white btn-sm">
            <span><i class="fa-solid fa-plus me-2"></i></span>Tambah Brand
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
                    <th scope="col">Category</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($brands as $brand)
                <tr>
                    <th scope="row">
                        {{ $brand->id }}
                    </th>
                    <td>
                        {{ $brand->name }}
                    </td>
                    <td>
                        @if ($brand->category)
                            {{ $brand->category->name }}
                        @else
                            No Category
                        @endif
                    </td>
                    <td>
                        {{ $brand->slug }}
                    </td>
                    <td>
                        {{ $brand->status == '1' ? 'hidden':'visible' }}
                    </td>
                    <td>
                        <a href="" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal"
                            data-bs-target="#updateBrandModal" class="btn btn-sm btn-primary shadow mr-2 mb-2">
                            Edit
                        </a>
                        <a href="" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                            class="btn btn-danger btn-sm shadow mr-2 mb-2">
                            Delete
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Tidak Ada Brand Yang Ditemukan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $brands->links() }}
        </div>
    </div>
</div>

@push('script')

<script>
    window.addEventListener('close-modal', event => {
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    });

</script>

@endpush
