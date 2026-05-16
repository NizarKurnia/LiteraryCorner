@extends('layouts.app')

@section('title', 'Contact')

@section('content')

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">
                {{ Auth::user()->role === 'admin' ? 'All Messages' : 'My Messages' }}
            </h1>
            <p class="text-secondary">
                {{ Auth::user()->role === 'admin' ? 'List of all incoming messages.' : 'List of messages you have sent.' }}
            </p>
        </div>

        {{-- User bisa kirim pesan baru --}}
        @if (Auth::user()->role !== 'admin')
            <a href="{{ route('contacts.create') }}" class="btn btn-primary">+ Send Message</a>
        @endif
    </div>

    @if ($contacts->count() > 0)

        @foreach ($contacts as $contact)
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            {{-- Admin lihat nama pengirim, user tidak perlu --}}
                            @if (Auth::user()->role === 'admin')
                                <p class="text-secondary mb-1">From: <strong>{{ $contact->user->name }}</strong></p>
                            @endif
                            <h5 class="fw-bold mb-1">{{ $contact->subject }}</h5>
                            <p class="text-secondary mb-0">{{ $contact->message }}</p>
                        </div>

                        <div class="text-end ms-4">
                            <small class="text-secondary">{{ $contact->created_at->format('d M Y H:i') }}</small>

                            {{-- Tombol delete khusus admin --}}
                            @if (Auth::user()->role === 'admin')
                                <form action="/contacts/{{ $contact->id }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

    @else

        <div class="card shadow-sm border-0">
            <div class="card-body text-center py-5">
                <h2 class="mb-3">💬</h2>
                <h4 class="fw-bold">No Messages Yet</h4>
                <p class="text-secondary mb-4">You haven't sent any messages yet.</p>
                <a href="{{ route('contacts.create') }}" class="btn btn-primary">Send a Message</a>
            </div>
        </div>

    @endif

@endsection
