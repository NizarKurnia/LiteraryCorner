<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="bg-dark text-white p-3 vh-100 position-fixed" style="width: 250px;">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Admin Panel</h4>
            <a href="{{ url('/') }}" class="btn btn-outline-light btn-sm">
                🌐 Site
            </a>
        </div>

        <ul class="nav flex-column">

            <li class="nav-item mb-2">
                <a href="{{ url('/admin/dashboard') }}"
                    class="nav-link text-white {{ request()->is('admin/dashboard') ? 'fw-bold text-warning' : '' }}">
                    📊 Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ url('/admin/users') }}"
                    class="nav-link text-white {{ request()->is('admin/users*') ? 'fw-bold text-warning' : '' }}">
                    👤 Users
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ url('/admin/books') }}"
                    class="nav-link text-white {{ request()->is('admin/books*') ? 'fw-bold text-warning' : '' }}">
                    📚 Books
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ url('/admin/authors') }}"
                    class="nav-link text-white {{ request()->is('admin/authors*') ? 'fw-bold text-warning' : '' }}">
                    ✍️ Authors
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ url('/admin/genres') }}"
                    class="nav-link text-white {{ request()->is('admin/genres*') ? 'fw-bold text-warning' : '' }}">
                    🏷️ Genres
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ url('/admin/transactions') }}"
                    class="nav-link text-white {{ request()->is('admin/transactions*') ? 'fw-bold text-warning' : '' }}">
                    💳 Transactions
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="{{ url('/admin/contacts') }}"
                    class="nav-link text-white {{ request()->is('admin/contacts*') ? 'fw-bold text-warning' : '' }}">
                    💬 Contacts
                </a>
            </li>

            <hr>

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link text-danger bg-transparent border-0 w-100 text-start">
                        🚪 Logout
                    </button>
                </form>
            </li>

        </ul>

    </div>
</div>
