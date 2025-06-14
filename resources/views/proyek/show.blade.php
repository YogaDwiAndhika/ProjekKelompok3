@extends('layout.main')
@section('title', 'Detail Proyek')

@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>Nama Proyek</th>
            <td>{{ $proyek->NamaProyek }}</td>
        </tr>
        <tr>
            <th>Perumahan</th>
            <td>{{ $proyek->perumahan->NamaPerumahan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tanggal Mulai</th>
            <td>{{ $proyek->TanggalMulai }}</td>
        </tr>
        <tr>
            <th>Tanggal Selesai</th>
            <td>{{ $proyek->TanggalSelesai }}</td>
        </tr>
        <tr>
            <th>Estimasi Biaya</th>
            <td>{{ $proyek->EstimasiBiaya }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $proyek->status }}</td>
        </tr>
        <tr>
            <th>Dibuat pada</th>
            <td>{{ $proyek->created_at }}</td>
        </tr>
        <tr>
            <th>Diupdate pada</th>
            <td>{{ $proyek->updated_at }}</td>
        </tr>
    </table>
    <a href="{{ route('proyek.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection