@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- HERO SECTION -->
    <div class="bg-dark text-light rounded p-5 mb-5 shadow">

        <div class="row align-items-center">

            <div class="col-md-6">

                <h1 class="display-4 fw-bold mb-3">
                    Welcome to LiteraryCorner
                </h1>

                <p class="lead mb-4">
                    Temukan berbagai buku menarik dari berbagai genre untuk menemani waktu membaca Anda.
                </p>

                <a href="/books" class="btn btn-primary btn-lg">
                    Explore Books
                </a>

            </div>

            <div class="col-md-6 text-center">

                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1200&auto=format&fit=crop"
                    class="img-fluid rounded shadow" alt="Books">

            </div>

        </div>

    </div>

    <!-- ABOUT US -->
    <div class="bg-light rounded p-5 shadow-sm">

        <div class="row align-items-center">

            <div class="col-md-6">

                <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=1200&auto=format&fit=crop"
                    class="img-fluid rounded" alt="Library">

            </div>

            <div class="col-md-6">

                <h2 class="fw-bold mb-3">
                    About Us
                </h2>

                <p class="text-secondary">
                    LiteraryCorner  adalah platform untuk membaca dan menemukan buku terbaik dari berbagai kategori.
                </p>

                <p class="text-secondary">
                    Kami ingin membantu semua orang menemukan buku favorit mereka dengan pengalaman yang mudah dan nyaman.
                </p>

                <a href="/about" class="btn btn-dark">
                    Learn More
                </a>

            </div>
            

        </div>

    </div>

@endsection
