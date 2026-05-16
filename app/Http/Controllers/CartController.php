<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('book')
            ->where('customer_id', Auth::id())
            ->get();

        return view('pages.carts.index', compact('carts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->stock < $request->quantity) {
            return redirect()->back()
                ->with('error', 'Stok buku tidak mencukupi!');
        }

        $totalPrice = $book->price * $request->quantity;

        Cart::create([
            'customer_id' => Auth::id(),
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('carts.index')
            ->with('success', 'Buku berhasil ditambahkan ke keranjang!');
    }

    public function show(string $id)
    {
        $cart = Cart::with('book')
            ->where('customer_id', Auth::id())
            ->findOrFail($id);

        return view('pages.carts.show', compact('cart'));
    }

    public function update(Request $request, string $id)
    {
        $cart = Cart::where('customer_id', Auth::id())->findOrFail($id);

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($cart->book_id);

        if ($book->stock < $request->quantity) {
            return redirect()->back()
                ->with('error', 'Stok buku tidak mencukupi!');
        }

        $cart->update([
            'quantity' => $request->quantity,
            'total_price' => $book->price * $request->quantity,
        ]);

        return redirect()->route('carts.index')
            ->with('success', 'Keranjang berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $cart = Cart::where('customer_id', Auth::id())->findOrFail($id);
        $cart->delete();

        return redirect()->route('carts.index')
            ->with('success', 'Item berhasil dihapus dari keranjang!');
    }
}
