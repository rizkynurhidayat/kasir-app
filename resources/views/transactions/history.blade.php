@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0">Riwayat Transaksi</h2>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($transactions->isEmpty())
        <div class="text-center py-5">
            <div class="mb-3">
                <i class="fas fa-receipt fa-3x text-muted"></i>
            </div>
            <p class="text-muted">Belum ada transaksi</p>
        </div>
    @else
        @foreach ($transactions as $transaction)
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Transaksi #{{ $transaction->id }}</h5>
                        <span class="text-muted">{{ $transaction->created_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Customer:</strong></p>
                            <p class="text-muted">{{ $transaction->customer->nama }}</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p class="mb-1"><strong>Total Harga:</strong></p>
                            <h5 class="text-primary mb-0">Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</h5>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Produk</th>
                                    <th class="text-end">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction->details as $detail)
                                    <tr>
                                        <td>{{ $detail->product->nama }}</td>
                                        <td class="text-end">Rp {{ number_format($detail->product->harga, 0, ',', '.') }}</td>
                                        <td class="text-center">{{ $detail->jumlah }}</td>
                                        <td class="text-end">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
