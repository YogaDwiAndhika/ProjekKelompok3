@extends('layout.main')
@section('title', 'Daftar Proyek')

@section('content')
<div class="container">
    @can('create', App\Models\Proyek::class)
    <a href="{{ route('proyek.create') }}" class="btn btn-primary mb-3">Tambah Proyek</a>
    @endcan
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
            @foreach($proyek as $item)
            <tr>
                <td>{{ $item->NamaProyek }}</td>
                <td>{{ $item->perumahan->NamaPerumahan ?? '-' }}</td>
                <td>{{ $item->TanggalMulai }}</td>
                <td>{{ $item->TanggalSelesai }}</td>
                <td>{{ $item->EstimasiBiaya }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="{{ route('proyek.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    @can('update', $item)
                    <a href="{{ route('proyek.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @endcan
                    @can('delete', $item)
                    <form action="{{ route('proyek.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
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