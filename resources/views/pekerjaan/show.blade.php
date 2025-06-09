@extends('layout.main')
@section('title', 'Detail Pekerjaan')

@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $pekerjaan->id }}</td>
        </tr>
        <tr>
            <th>Nama Pekerjaan</th>
            <td>{{ $pekerjaan->NamaPekerjaan }}</td>
        </tr>
        <tr>
            <th>Deskripsi Pekerjaan</th>
            <td>{{ $pekerjaan->DeskripsiPekerjaan }}</td>
        </tr>
        <tr>
            <th>Gaji</th>
            <td>{{ $pekerjaan->Gaji ? 'Rp ' . number_format($pekerjaan->Gaji, 0, ',', '.') : '-' }}</td>
        </tr>
    </table>
    <a href="{{ route('pekerjaan.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('pekerjaan.edit', $pekerjaan->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection