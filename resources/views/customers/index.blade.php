@extends('layouts.app')

@section('content')
    <h2>Daftar Customer</h2>
    <a href="{{ route('customers.create') }}">+ Tambah Customer</a>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->nama }}</td>
                    <td>{{ $customer->telepon }}</td>
                    <td>{{ $customer->alamat }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus customer ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
