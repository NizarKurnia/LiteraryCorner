@extends('layouts.app')

@section('title', 'About Us')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-8">

        <!-- ABOUT CARD -->
        <div class="card shadow-sm border-0">

            <div class="card-body p-5">

                <h1 class="fw-bold mb-4 text-center">
                    About Us
                </h1>

                <p class="text-secondary fs-5 text-center mb-5">
                    LiteraryCorner  adalah website yang menyediakan berbagai koleksi buku dari berbagai genre untuk membantu pengguna menemukan buku favorit mereka dengan mudah.
                </p>

                <div class="row text-center">

                    <div class="col-md-4 mb-4">

                        <div class="p-4 bg-light rounded">

                            <h3>
                                📚
                            </h3>

                            <h5 class="fw-bold mt-3">
                                Many Books
                            </h5>

                            <p class="text-secondary">
                                Berbagai pilihan buku menarik tersedia untuk dibaca dan dibeli.
                            </p>

                        </div>

                    </div>

                    <div class="col-md-4 mb-4">

                        <div class="p-4 bg-light rounded">

                            <h3>
                                ⚡
                            </h3>

                            <h5 class="fw-bold mt-3">
                                Easy Access
                            </h5>

                            <p class="text-secondary">
                                Tampilan sederhana dan mudah digunakan untuk semua pengguna.
                            </p>

                        </div>

                    </div>

                    <div class="col-md-4 mb-4">

                        <div class="p-4 bg-light rounded">

                            <h3>
                                💬
                            </h3>

                            <h5 class="fw-bold mt-3">
                                User Friendly
                            </h5>

                            <p class="text-secondary">
                                Membantu pengguna menjelajahi buku dengan nyaman.
                            </p>

                        </div>

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="text-center mt-4">

                    <a href="/books" class="btn btn-primary btn-lg">
                        Explore Books
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
