@extends('layouts.app')

@section('content')
    <h2>Edit Customer</h2>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="nama" value="{{ $customer->nama }}" required>
        <input type="text" name="telepon" value="{{ $customer->telepon }}" required>
        <input type="text" name="alamat" value="{{ $customer->alamat }}" required>
        <button type="submit">Update</button>
    </form>
@endsection
