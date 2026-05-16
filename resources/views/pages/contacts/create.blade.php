@extends('layouts.app')

@section('title', 'Contact Admin')

@section('content')

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <!-- HEADER -->
            <div class="text-center mb-4">

                <h1 class="fw-bold">
                    Send Message
                </h1>

                <p class="text-secondary">
                    Send questions, feedback, or problems to the admin.
                </p>

            </div>

            <!-- FORM -->
            <div class="card shadow-sm border-0">

                <div class="card-body p-4">

                    <form action="/contacts" method="POST">

                        @csrf
                        <!-- SUBJECT -->
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Subject
                            </label>

                            <input type="text" name="subject" class="form-control" placeholder="Enter message subject"
                                required>

                        </div>

                        <!-- MESSAGE -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Message
                            </label>

                            <textarea name="message" rows="6" class="form-control" placeholder="Write your message here..."
                                required></textarea>

                        </div>

                        <!-- BUTTON -->
                        <div class="d-flex gap-2">

                            <button class="btn btn-primary w-100">
                                Send Message
                            </button>

                            <a href="/contacts" class="btn btn-outline-dark w-100">
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
