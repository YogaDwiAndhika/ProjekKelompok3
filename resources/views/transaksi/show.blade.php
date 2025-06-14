@extends('layout.main')
@section('title', 'Detail Transaksi')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Detail Transaksi</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Pelanggan</th>
                    <td>{{ $transaksi->namaPelanggan }}</td>
                </tr>
                <tr>
                    <th>No. Telp</th>
                    <td>{{ $transaksi->notelp }}</td>
                </tr>
                <tr>
                    <th>Perumahan</th>
                    <td>{{ $transaksi->perumahan->NamaPerumahan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Dicatat Oleh</th>
                    <td>{{ $transaksi->karyawan->NamaKaryawan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>{{ $transaksi->Harga }}</td>
                </tr>
                <tr>
                    <th>Dibuat pada</th>
                    <td>{{ $transaksi->created_at }}</td>
                </tr>
                <tr>
                    <th>Diupdate pada</th>
                    <td>{{ $transaksi->updated_at }}</td>
                </tr>
            </table> <br>
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection