@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Daftar Produk</h2>
        <a href="{{ route('products.create') }}" class="btn" style="background-color: #3498db; color: white; margin-bottom: 20px;">+ Tambah Produk</a>
        
        <table class="table table-bordered table-striped" style="background-color: white;">
            <thead style="background-color: #2980b9; color: white;">
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->nama }}</td>
                        <td>Rp{{ number_format($product->harga) }}</td>
                        <td>{{ $product->stok }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin mau hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection