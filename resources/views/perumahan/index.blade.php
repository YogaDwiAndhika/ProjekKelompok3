@extends('layout.main')
@section('title', 'Daftar Perumahan')

@section('content')
<div class="container">
    <a href="{{ route('perumahan.create') }}" class="btn btn-primary mb-3">Tambah Perumahan</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tipe Perumahan</th>
                <th>Lokasi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($perumahan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->TipePerumahan }}</td>
                <td>{{ $item->Lokasi }}</td>
                <td>
                    @if($item->Gambarperumahan)
                        <img src="{{ asset('storage/gambarperumahan/' . $item->Gambarperumahan) }}" alt="Gambar Perumahan" width="80">
                    @else
                        <span class="text-muted">Tidak ada gambar</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('perumahan.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('perumahan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('perumahan.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data perumahan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection