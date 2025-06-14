@extends('layout.main')
@section('title', 'Daftar Detail Proyek')

@section('content')
<div class="container">
    @can('create', App\Models\Detailproyek::class)
    <a href="{{ route('detailproyek.create') }}" class="btn btn-primary mb-3">Tambah Detail Proyek</a>
    @endcan
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
            @foreach($detailProyek as $dp)
            <tr>
                <td>{{ $dp->proyek->NamaProyek ?? '-' }}</td>
                <td>{{ $dp->bahan->NamaBahan ?? '-' }}</td>
                <td>{{ $dp->volume }}</td>
                <td>{{ $dp->pekerjaan->NamaPekerjaan ?? '-' }}</td>
                <td>{{ $dp->TotalBiaya }}</td>
                <td>
                    <a href="{{ route('detailproyek.show', $dp->id) }}" class="btn btn-info btn-sm">Detail</a>
                    @can('update', $dp)
                    <a href="{{ route('detailproyek.edit', $dp->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @endcan
                    @can('delete', $dp)
                    <form action="{{ route('detailproyek.destroy', $dp->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus detail proyek ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection