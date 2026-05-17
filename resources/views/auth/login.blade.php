@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-5">
            <div class="card shadow border-0">
                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <h1 class="fw-bold">Login</h1>
                        <p class="text-secondary">Login to your LiteraryCorner account</p>
                    </div>

                    {{-- TAMPILKAN ERROR --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    {{-- SUCCESS MESSAGE --}}
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="/login" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter your email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter your password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary w-100 mb-3">Login</button>

                        <div class="text-center">
                            <span class="text-secondary">Don't have an account?</span>
                            <a href="/register" class="text-decoration-none">Register</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
