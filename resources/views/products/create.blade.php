@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Tambah Produk</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" style="background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Produk</label>
                                <input type="text" name="nama" id="nama" placeholder="Nama Produk" required style="width: 100%; padding: 10px; margin-bottom: 10px;  border: 1px solid #ccc; border-radius: 5px;">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" id="harga" placeholder="Harga Produk" required style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            </div>
                            <!-- <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" name="stok" id="stok" placeholder="Jumlah Stok" required style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;">
                            </div> -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection