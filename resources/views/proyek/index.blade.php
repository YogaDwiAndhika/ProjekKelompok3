@extends('layout.main')
@section('title', 'Daftar Proyek')

@section('content')
<div class="container">
    <a href="{{ route('proyek.create') }}" class="btn btn-primary mb-3">Tambah Proyek</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Proyek</th>
                <th>Perumahan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Estimasi Biaya</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyeks as $proyek)
            <tr>
                <td>{{ $proyek->NamaProyek }}</td>
                <td>{{ $proyek->perumahan->NamaPerumahan ?? '-' }}</td>
                <td>{{ $proyek->TanggalMulai }}</td>
                <td>{{ $proyek->TanggalSelesai }}</td>
                <td>{{ $proyek->EstimasiBiaya }}</td>
                <td>{{ $proyek->status }}</td>
                <td>
                    <a href="{{ route('proyek.show', $proyek->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('proyek.edit', $proyek->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('proyek.destroy', $proyek->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection