@extends('layout.main')
@section('title', 'Daftar Detail Proyek')

@section('content')
<div class="container">
    <a href="{{ route('detailproyek.create') }}" class="btn btn-primary mb-3">Tambah Detail Proyek</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Proyek</th>
                <th>Bahan</th>
                <th>Volume</th>
                <th>Pekerjaan</th>
                <th>Total Biaya</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detailProyeks as $dp)
            <tr>
                <td>{{ $dp->proyek->NamaProyek ?? '-' }}</td>
                <td>{{ $dp->bahan->NamaBahan ?? '-' }}</td>
                <td>{{ $dp->volume }}</td>
                <td>{{ $dp->pekerjaan->NamaPekerjaan ?? '-' }}</td>
                <td>{{ $dp->TotalBiaya }}</td>
                <td>
                    <a href="{{ route('detailproyek.show', $dp->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('detailproyek.edit', $dp->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('detailproyek.destroy', $dp->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus detail proyek ini?')">
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