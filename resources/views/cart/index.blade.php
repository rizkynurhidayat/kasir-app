@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Keranjang Belanja</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('cart.store') }}" method="POST" class="row g-3 align-items-end">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Pilih Produk</label>
                            <select name="product_id" class="form-select" required>
                                <option value="">-- Pilih Produk --</option>
                                @foreach(\App\Models\Product::all() as $product)
                                    <option value="{{ $product->id }}">{{ $product->nama }} - Rp{{ number_format($product->harga) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="quantity" class="form-control" value="1" min="1">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary w-100">Tambah ke Keranjang</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td>{{ $cart->product->nama }}</td>
                                        <td>Rp{{ number_format($cart->product->harga) }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="me-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <button name="action" value="decrease" class="btn btn-sm btn-outline-secondary">-</button>
                                                </form>
                                                <span class="mx-2">{{ $cart->quantity }}</span>
                                                <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="ms-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <button name="action" value="increase" class="btn btn-sm btn-outline-secondary">+</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>Rp{{ number_format($cart->product->harga * $cart->quantity) }}</td>
                                        <td>
                                            <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h4 class="mb-0">Total Bayar: Rp{{ number_format($total) }}</h4>
                        <div>
                            <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger me-2">Kosongkan Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <form action="{{ route('transaction.store') }}" method="POST">
                        @csrf
                        <div class="row g-3 align-items-end">
                            <div class="col-md-8">
                                <label class="form-label">Pilih Customer</label>
                                <select name="customer_id" class="form-select">
                                    <option value="">-- Pilih Customer --</option>
                                    @foreach(\App\Models\Customer::all() as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->nama }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="customer_name" value="Unknown">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success w-100">Selesaikan Transaksi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
