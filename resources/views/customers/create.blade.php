@extends('layouts.app')

@section('content')
    <h2>Tambah Customer</h2>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <input type="text" name="nama" placeholder="Nama Customer" required>
        <input type="number" name="telepon" placeholder="No HP" required>
        <input type="text" name="alamat" placeholder="Alamat" required>
        <button type="submit">Simpan</button>
    </form>
@endsection
