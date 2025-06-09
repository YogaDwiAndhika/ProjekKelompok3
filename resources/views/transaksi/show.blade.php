@extends('layout.main')
@section('title', 'Detail Transaksi')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $transaksi->id }}</p>
            <p><strong>Nama Pelanggan:</strong> {{ $transaksi->namapelanggan }}</p>
            <p><strong>No. Telp:</strong> {{ $transaksi->notelp }}</p>
            <p><strong>Perumahan:</strong> {{ $transaksi->perumahan->Lokasi ?? '-' }}</p>
            <p><strong>Dibuat:</strong> {{ $transaksi->created_at }}</p>
            <p><strong>Diupdate:</strong> {{ $transaksi->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection