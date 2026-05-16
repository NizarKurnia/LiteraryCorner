@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="row justify-content-center align-items-center" style="min-height: 80vh;">

    <div class="col-md-5">

        <div class="card shadow border-0">

            <div class="card-body p-5">

                <!-- HEADER -->
                <div class="text-center mb-4">

                    <h1 class="fw-bold">
                        Register
                    </h1>

                    <p class="text-secondary">
                        Join LiteraryCorner today
                    </p>

                </div>

                <!-- FORM -->
                <form action="/register" method="POST">

                    @csrf

                    <!-- NAME -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Enter your name"
                            required
                        >

                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Enter your email"
                            required
                        >

                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter your password"
                            required
                        >

                    </div>

                    <!-- CONFIRM PASSWORD -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Confirm Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Confirm your password"
                            required
                        >

                    </div>

                    <!-- BUTTON -->
                    <button class="btn btn-primary w-100 mb-3">
                        Register
                    </button>

                    <!-- LOGIN -->
                    <div class="text-center">

                        <span class="text-secondary">
                            Already have an account?
                        </span>

                        <a href="/login" class="text-decoration-none">
                            Login
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
