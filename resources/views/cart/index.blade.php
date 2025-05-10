@extends('layouts.app')

@section('content')
    <h2>Keranjang Belanja</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('cart.store') }}" method="POST">
        @csrf
        <select name="product_id" required>
            <option value="">-- Pilih Produk --</option>
            @foreach(\App\Models\Product::all() as $product)
                <option value="{{ $product->id }}">{{ $product->nama }} - Rp{{ number_format($product->harga) }}</option>
            @endforeach
        </select>
        <input type="number" name="quantity" value="1" min="1">
        <button type="submit">Tambah ke Keranjang</button>
    </form>

    <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 20px;">
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        @foreach ($carts as $cart)
            <tr>
                <td>{{ $cart->product->nama }}</td>
                <td>Rp{{ number_format($cart->product->harga) }}</td>
                <td>
                    <form action="{{ route('cart.update', $cart->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <button name="action" value="decrease">-</button>
                    </form>
                    {{ $cart->quantity }}
                    <form action="{{ route('cart.update', $cart->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PUT')
                        <button name="action" value="increase">+</button>
                    </form>
                </td>
                <td>Rp{{ number_format($cart->product->harga * $cart->quantity) }}</td>
                <td>
                    <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h3>Total Bayar: Rp{{ number_format($total) }}</h3>

    <form action="{{ route('cart.clear') }}" method="POST">
        @csrf
        <button type="submit">Kosongkan Keranjang</button>
    </form>

    <form action="{{ route('transaction.store') }}" method="POST" style="margin-top: 20px;">
        @csrf
        <label>Pilih Customer</label>
        <select name="customer_id" required>
            <option value="">-- Pilih --</option>
            @foreach(\App\Models\Customer::all() as $customer)
                <option value="{{ $customer->id }}">{{ $customer->nama }}</option>
            @endforeach
        </select>
        <button type="submit">Selesaikan Transaksi</button>
    </form>
@endsection
