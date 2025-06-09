@extends('layout.main')
@section('title', 'Daftar Transaksi')

@section('content')
<div class="container">
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>No. Telp</th>
                <th>Perumahan</th>
                <th>Dibuat</th>
                <th>Diupdate</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $trx)
            <tr>
                <td>{{ $trx->id }}</td>
                <td>{{ $trx->namapelanggan }}</td>
                <td>{{ $trx->notelp }}</td>
                <td>{{ $trx->perumahan->Lokasi ?? '-' }}</td>
                <td>{{ $trx->created_at }}</td>
                <td>{{ $trx->updated_at }}</td>
                <td>
                    <a href="{{ route('transaksi.show', $trx->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('transaksi.edit', $trx->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('transaksi.destroy', $trx->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection