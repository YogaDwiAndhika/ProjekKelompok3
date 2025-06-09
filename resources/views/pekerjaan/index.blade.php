@extends('layout.main')
@section('title', 'Daftar Pekerjaan')

@section('content')
<div class="container">
    <a href="{{ route('pekerjaan.create') }}" class="btn btn-primary mb-3">Tambah Pekerjaan</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pekerjaan</th>
                <th>Deskripsi Pekerjaan</th>
                <th>Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pekerjaan as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->NamaPekerjaan }}</td>
                <td>{{ $item->DeskripsiPekerjaan }}</td>
                <td>{{ $item->Gaji ? 'Rp ' . number_format($item->Gaji, 0, ',', '.') : '-' }}</td>
                <td>
                    <a href="{{ route('pekerjaan.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('pekerjaan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pekerjaan.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data pekerjaan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection