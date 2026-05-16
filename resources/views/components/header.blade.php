<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">

            <!-- Logo / Brand -->
            <a class="navbar-brand fw-bold" href="/">
                LiteraryCorner
            </a>

            <!-- Button Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarMenu">

                <!-- Left Menu -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/books">Books</a>
                    </li>

                    {{-- Hanya tampil kalau sudah login --}}
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/carts">Carts</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/transactions">Transactions</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/contacts">Contacts</a>
                        </li>
                    @endauth

                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Us</a>
                    </li>

                </ul>

                <!-- Right Menu -->
                <div class="d-flex gap-2 align-items-center">

                    @guest
                        {{-- Belum login --}}
                        <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @endguest

                    @auth
                        {{-- Sudah login --}}
                        <span class="text-white me-2">Halo, {{ Auth::user()->name }}</span>

                        {{-- Tombol Dashboard hanya untuk admin --}}
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm">
                                Dashboard
                            </a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Logout</button>
                        </form>
                    @endauth

                </div>

            </div>
        </div>
    </nav>
</header>
