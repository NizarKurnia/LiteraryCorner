@extends('layouts.admin')

@section('title', 'Edit Transaction')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold mb-0">Edit Transaction</h1>
        <a href="{{ route('admin.transactions.index') }}" class="btn btn-outline-dark">← Back</a>
    </div>

    <div class="row justify-content-center ps-lg-5 ms-5">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">

                    <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Payment Status
                            </label>

                            <select name="payment_status" class="form-select @error('payment_status') is-invalid @enderror">

                                <option value="Pending" {{ old('payment_status', $transaction->payment_status) == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>

                                <option value="Paid" {{ old('payment_status', $transaction->payment_status) == 'paid' ? 'selected' : '' }}>
                                    Paid
                                </option>

                                <option value="Cancelled" {{ old('payment_status', $transaction->payment_status) == 'cancelled' ? 'selected' : '' }}>
                                    Cancelled
                                </option>

                            </select>

                            @error('payment_status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100">Update Transaction</button>
                            <a href="{{ route('admin.transactions.index') }}" class="btn btn-outline-dark w-100">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
