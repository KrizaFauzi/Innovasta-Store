@extends('layouts.admin')
@section('title','User List')
@section('content')

<div class="d-flex justify-content-between bg-white shadow-sm rounded-1 align-items-center py-2 px-3 mb-3">
    <p class="fw-bold my-auto" style="font-size: 23px;">Users</p>
    <a href="{{ url('admin/users/create') }}" class="btn btn-info shadow fw-semibold text-white btn-sm">
        <span><i class="fa-solid fa-plus me-2"></i></span>Add User
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
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->role_as == '0')
                            <label class="badge bg-primary">User</label>
                        @elseif ($user->role_as == '1')
                            <label class="badge bg-success">Admin</label>
                        @else
                            <label class="badge bg-danger">None</label>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-sm btn-primary shadow mr-2 mb-2">
                            Edit
                        </a>
                        <a href="{{ url('admin/users/'.$user->id.'/delete') }}" 
                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" 
                            class="btn btn-sm btn-danger shadow mb-2">
                            Hapus
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No Users Available</td>
                </tr>
            @endforelse

        </tbody>
    </table>
    <div>
        {{ $users->links() }}
    </div>
</div>

@endsection
