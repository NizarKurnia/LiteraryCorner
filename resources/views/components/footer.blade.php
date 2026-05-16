<footer class="bg-dark text-light mt-5 pt-5 pb-3">
    <div class="container">

        <div class="row">

            <!-- Brand -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">
                    LiteraryCorner
                </h5>

                <p class="text-secondary">
                    Platform untuk membaca, membeli, dan mengelola buku dengan mudah.
                </p>
            </div>

            <!-- Navigation -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">
                    Navigation
                </h5>

                <ul class="list-unstyled">

                    <li class="mb-2">
                        <a href="/" class="text-decoration-none text-secondary">
                            Home
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="/books" class="text-decoration-none text-secondary">
                            Books
                        </a>
                    </li>

                    @auth
                        <li class="mb-2">
                            <a href="/carts" class="text-decoration-none text-secondary">
                                Carts
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="/transactions" class="text-decoration-none text-secondary">
                                Transactions
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="/contacts" class="text-decoration-none text-secondary">
                                Contacts
                            </a>
                        </li>
                    @endauth

                    <li class="mb-2">
                        <a href="/about" class="text-decoration-none text-secondary">
                            About Us
                        </a>
                    </li>

                </ul>
            </div>

            <!-- Contact -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">
                    Contact
                </h5>

                <p class="text-secondary mb-1">
                    Email: admin@LiteraryCorner.com
                </p>

                <p class="text-secondary mb-1">
                    Phone: +62 812 3456 7890
                </p>

                <p class="text-secondary">
                    Indonesia
                </p>
            </div>

        </div>

        <hr class="border-secondary">

        <!-- Bottom -->
        <div class="text-center text-secondary">
            © {{ date('Y') }} LiteraryCorner. All rights reserved.
        </div>

    </div>
</footer>
