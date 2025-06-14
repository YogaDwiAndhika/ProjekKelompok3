@extends('layout.main')
@section('title', 'Daftar Transaksi')

@section('content')
<div class="container">
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>No. Telp</th>
                <th>Perumahan</th>
                <th>Dicatat Oleh</th>
                <th>Harga</th>
                <th>Created At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $transaksi)
            <tr>
                <td>{{ $transaksi->namaPelanggan }}</td>
                <td>{{ $transaksi->notelp }}</td>
                <td>{{ $transaksi->perumahan->NamaPerumahan ?? '-' }}</td>
                <td>{{ $transaksi->karyawan->NamaKaryawan ?? '-' }}</td>
                <td>{{ $transaksi->Harga }}</td>
                <td>{{ $transaksi->created_at }}</td>
                <td>
                    <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection