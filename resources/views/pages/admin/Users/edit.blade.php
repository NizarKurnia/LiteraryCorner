@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold mb-0">Edit User</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-dark">← Back</a>
    </div>

    <div class="row justify-content-center ps-lg-5 ms-5">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <textarea name="email" rows="4"
                                class="form-control @error('email') is-invalid @enderror">{{ old('email', $user->email) }}</textarea>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Role</label>
                            <textarea name="role" rows="4"
                                class="form-control @error('role') is-invalid @enderror">{{ old('role', $user->role) }}</textarea>
                            @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100">Update user</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-dark w-100">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
