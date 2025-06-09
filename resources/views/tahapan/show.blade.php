@extends('layout.main')
@section('title', 'Detail Tahapan')

@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $tahapan->id }}</td>
        </tr>
        <tr>
            <th>Deskripsi Tahapan</th>
            <td>{{ $tahapan->deskripsi_tahapan }}</td>
        </tr>
        <tr>
            <th>Volume</th>
            <td>{{ $tahapan->volume ?? '-' }}</td>
        </tr>
        <tr>
            <th>Bahan</th>
            <td>{{ $tahapan->bahan->NamaBahan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $tahapan->pekerjaan->NamaPekerjaan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $tahapan->status }}</td>
        </tr>
        <tr>
            <th>Total Upah</th>
            <td>{{ $tahapan->TotalUpah ?? '-' }}</td>
        </tr>
        <tr>
            <th>Transaksi</th>
            <td>{{ $tahapan->transaksi->id ?? '-' }}</td>
        </tr>
        <tr>
            <th>Dibuat</th>
            <td>{{ $tahapan->created_at }}</td>
        </tr>
        <tr>
            <th>Diupdate</th>
            <td>{{ $tahapan->updated_at }}</td>
        </tr>
    </table>
    <a href="{{ route('tahapan.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('tahapan.edit', $tahapan->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection