@extends('layouts.app')

@section('content')
    <h2>Riwayat Transaksi</h2>

    @if (session('success'))
        <div style="color: green">{{ session('success') }}</div>
    @endif

    @foreach ($transactions as $transaction)
        <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 20px;">
            <h4>Transaksi #{{ $transaction->id }} | Tanggal: {{ $transaction->created_at->format('d M Y, H:i') }}</h4>
            <p><strong>Customer:</strong> {{ $transaction->customer->nama }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</p>

            <table border="1" cellpadding="10" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaction->details as $detail)
                        <tr>
                            <td>{{ $detail->product->nama }}</td>
                            <td>Rp {{ number_format($detail->product->harga, 0, ',', '.') }}</td>
                            <td>{{ $detail->jumlah }}</td>
                            <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach

    @if ($transactions->isEmpty())
        <p>Belum ada transaksi ya sayangku 🥲</p>
    @endif
@endsection
