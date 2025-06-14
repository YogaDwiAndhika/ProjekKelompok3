@extends('layout.main')
@section('title', 'Daftar Pekerjaan')

@section('content')
<div class="container">
    @can('create', App\Models\Pekerjaan::class)
    <a href="{{ route('pekerjaan.create') }}" class="btn btn-primary mb-3">Tambah Pekerjaan</a>
    @endcan
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pekerjaan</th>
                <th>Satuan</th>
                <th>Upah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pekerjaan as $item)
            <tr>
                <td>{{ $item->NamaPekerjaan }}</td>
                <td>{{ $item->Satuan }}</td>
                <td>{{ $item->Upah }}</td>
                <td>
                    <a href="{{ route('pekerjaan.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    @can('update', $item)
                    <a href="{{ route('pekerjaan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @endcan
                    @can('delete', $item)
                    <form action="{{ route('pekerjaan.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data pekerjaan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection