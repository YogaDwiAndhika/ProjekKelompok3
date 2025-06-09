@extends('layout.main')
@section('title', 'Daftar Bahan')

@section('content')
<div class="container">
    <a href="{{ route('bahan.create') }}" class="btn btn-primary mb-3">Tambah Bahan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Bahan</th>
                <th>Volume Bahan</th>
                <th>Harga</th>
                <th>Pekerjaan</th>
                <th>Dibuat</th>
                <th>Diupdate</th>
                <th>Aksi</th> <!-- Tambah kolom aksi -->
            </tr>
        </thead>
        <tbody>
            @foreach($bahan as $bahan)
            <tr>
                <td>{{ $bahan->id }}</td>
                <td>{{ $bahan->NamaBahan }}</td>
                <td>{{ $bahan->VolumeBahan }}</td>
                <td>{{ $bahan->Harga }}</td>
                <td>{{ $bahan->pekerjaan->NamaPekerjaan ?? '-' }}</td>
                <td>{{ $bahan->created_at }}</td>
                <td>{{ $bahan->updated_at }}</td>
                <td>
                    <a href="{{ route('bahan.show', $bahan->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('bahan.edit', $bahan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('bahan.destroy', $bahan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection