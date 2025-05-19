@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <!-- <div class="card shadow-sm"> -->
            <!-- <div class="card-header bg-white py-3"> -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h3 mb-0">Daftar Produk</h2>
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Produk
                    </a>
                </div>
            <!-- </div> -->
            
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold">Nama</th>
                                    <th class="fw-semibold">Harga</th>
                                    <!-- <th class="fw-semibold">Stok</th> -->
                                    <th  class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->nama }}</td>
                                        <td>Rp{{ number_format($product->harga) }}</td>
                                        <!-- <td>{{ $product->stok }}</td> -->
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('products.edit', $product->id) }}" 
                                                class="btn btn-sm btn-warning " 
                                                data-bs-toggle="tooltip" 
                                                title="Edit">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                
                                                <form action="{{ route('products.destroy', $product->id) }}" 
                                                    method="POST" 
                                                    class="d-inline" 
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-sm btn-danger "
                                                            data-bs-toggle="tooltip"
                                                            title="Hapus">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
@endsection