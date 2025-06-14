@extends('layout.main')
@section('title', 'Detail Proyek')

@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>Proyek</th>
            <td>{{ $detailProyek->proyek->NamaProyek ?? '-' }}</td>
        </tr>
        <tr>
            <th>Bahan</th>
            <td>{{ $detailProyek->bahan->NamaBahan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Volume</th>
            <td>{{ $detailProyek->volume }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $detailProyek->pekerjaan->NamaPekerjaan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Total Biaya</th>
            <td>{{ $detailProyek->TotalBiaya }}</td>
        </tr>
        <tr>
            <th>Dibuat</th>
            <td>{{ $detailProyek->created_at }}</td>
        </tr>
        <tr>
            <th>Diupdate</th>
            <td>{{ $detailProyek->updated_at }}</td>
        </tr>
    </table>
    <a href="{{ route('detailproyek.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection