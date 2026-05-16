@extends('layouts.admin')

@section('title', 'Add Author')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="fw-bold mb-0">Add Author</h1>
                <a href="{{ route('admin.authors.index') }}" class="btn btn-outline-dark">← Back</a>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <form action="{{ route('admin.authors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="Enter book name">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Bio</label>
                            <textarea name="bio" rows="4" class="form-control @error('bio') is-invalid @enderror"
                                placeholder="Enter book bio">{{ old('bio') }}</textarea>
                            @error('bio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Photo</label>
                            <input type="file" name="photo"
                                class="form-control @error('photo') is-invalid @enderror"
                                accept="image/jpg,image/jpeg,image/png">
                            @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100">Save Book</button>
                            <a href="{{ route('admin.authors.index') }}" class="btn btn-outline-dark w-100">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection
