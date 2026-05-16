<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // Admin — lihat semua transaksi
    public function adminIndex()
    {
        $transactions = Transaction::with('user', 'book')->latest()->get();
        return view('pages.admin.transactions.index', compact('transactions'));
    }

    // User — lihat transaksi milik sendiri
    public function index()
    {
        $transactions = Transaction::with('book')
            ->where('customer_id', Auth::id())
            ->latest()
            ->get();

        return view('pages.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $carts = \App\Models\Cart::with('book')
            ->where('customer_id', Auth::id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect()->route('carts.index')
                ->with('error', 'Keranjang kamu masih kosong!');
        }

        return view('pages.transactions.create', compact('carts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:Cash on Delivery,Transfer,E-Wallet',
        ]);

        $carts = \App\Models\Cart::with('book')
            ->where('customer_id', Auth::id())
            ->get();

        if ($carts->isEmpty()) {
            return redirect()->route('carts.index')
                ->with('error', 'Keranjang kamu masih kosong!');
        }

        foreach ($carts as $cart) {
            $book = $cart->book;

            if ($book->stock < $cart->quantity) {
                return redirect()->back()
                    ->with('error', "Stok buku '{$book->title}' tidak mencukupi!");
            }

            $book->stock -= $cart->quantity;
            $book->save();

            Transaction::create([
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'customer_id' => Auth::id(),
                'book_id' => $book->id,
                'quantity' => $cart->quantity,
                'total_amount' => $book->price * $cart->quantity,
                'payment_method' => $request->payment_method,
                'payment_status' => 'Pending',
            ]);
        }

        \App\Models\Cart::where('customer_id', Auth::id())->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Checkout berhasil! Pesanan sedang diproses.');
    }

    // User & Admin — lihat detail transaksi
    public function show(string $id)
    {
        $transaction = Transaction::with('book')->findOrFail($id);

        if (Auth::user()->role !== 'admin' && $transaction->customer_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('pages.transactions.show', compact('transaction'));
    }

    public function edit(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('pages.admin.transactions.edit', compact('transaction'));
    }

    // Admin — update status pembayaran
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::findOrFail($id);

        $request->validate([
            'payment_status' => 'required|in:Pending,Paid,Cancelled',
        ]);

        if ($request->payment_status === 'Cancelled' && $transaction->payment_status !== 'Cancelled') {
            $book = Book::findOrFail($transaction->book_id);
            $book->stock += $transaction->quantity;
            $book->save();
        }

        $transaction->update(['payment_status' => $request->payment_status]);

        return redirect()->route('admin.transactions.index')
            ->with('success', 'Status transaksi berhasil diupdate!');
    }

    // Admin — hapus transaksi
    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail($id);

        $book = Book::findOrFail($transaction->book_id);
        $book->stock += $transaction->quantity;
        $book->save();

        $transaction->delete();

        return redirect()->route('admin.transactions.index')
            ->with('success', 'Transaksi berhasil dihapus!');
    }
}
