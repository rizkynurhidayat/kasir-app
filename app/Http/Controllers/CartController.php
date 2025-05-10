<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        $carts = Cart::with('product')->get();
        $total = $carts->sum(function($cart) {
            return $cart->product->harga * $cart->quantity;
        });

        return view('cart.index', compact('carts', 'total'));
    }

    public function store(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::where('product_id', $request->product_id)->first();

        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            Cart::create($request->only('product_id', 'quantity'));
        }

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function update(Request $request, Cart $cart) {
        if ($request->action == 'increase') {
            $cart->quantity += 1;
        } elseif ($request->action == 'decrease' && $cart->quantity > 1) {
            $cart->quantity -= 1;
        }
        $cart->save();

        return back();
    }


    public function destroy(Cart $cart) {
        $cart->delete();
        return back()->with('success', 'Item dihapus dari keranjang!');
    }

    public function clear() {
        Cart::truncate();
        return redirect()->route('cart.index')->with('success', 'Keranjang dikosongkan!');
    }
}
