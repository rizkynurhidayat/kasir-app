<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'customer_id' => 'required|exists:customers,id'
        ]);
        $customerId = $request->customer_id;
        $customerName = $request->customer_name;

        if (empty($customerId)) {
            // Buat customer baru dengan nama "Unknown" jika belum ada
            $customer = Customer::firstOrCreate(
                ['nama' => $customerName],
                ['nama' => $customerName]
            );
            $customerId = $customer->id;
        }
        $carts = Cart::with('product')->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Keranjang kosong!');
        }

        $total = $carts->sum(function($cart) {
            return $cart->product->harga * $cart->quantity;
        });

        $transaction = Transaction::create([
            'customer_id' => $request->customer_id,
            'total_harga' => $total,
        ]);

        foreach ($carts as $cart) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $cart->product_id,
                'jumlah' => $cart->quantity,
                'subtotal' => $cart->product->harga * $cart->quantity
            ]);
        }

        Cart::truncate();

        return redirect()->route('transactions.history')->with('success', 'Transaksi berhasil disimpan!');
    }

    public function history() {
        $transactions = Transaction::with('customer', 'details.product')->latest()->get();
        return view('transactions.history', compact('transactions'));
    }
}
