@extends('layout.main')
@section('title', 'Daftar Tahapan')

@section('content')
<div class="container">
    <a href="{{ route('tahapan.create') }}" class="btn btn-primary mb-3">Tambah Tahapan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Deskripsi Tahapan</th>
                <th>Volume</th>
                <th>Bahan</th>
                <th>Pekerjaan</th>
                <th>Status</th>
                <th>Total Upah</th>
                <th>Transaksi</th>
                <th>Dibuat</th>
                <th>Diupdate</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tahapan as $t)
            <tr>
                <td>{{ $t->id }}</td>
                <td>{{ $t->deskripsi_tahapan }}</td>
                <td>{{ $t->volume ?? '-' }}</td>
                <td>{{ $t->bahan->NamaBahan ?? '-' }}</td>
                <td>{{ $t->pekerjaan->NamaPekerjaan ?? '-' }}</td>
                <td>{{ $t->status }}</td>
                <td>{{ $t->TotalUpah ?? '-' }}</td>
                <td>{{ $t->transaksi->id ?? '-' }}</td>
                <td>{{ $t->created_at }}</td>
                <td>{{ $t->updated_at }}</td>
                <td>
                    <a href="{{ route('tahapan.show', $t->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('tahapan.edit', $t->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('tahapan.destroy', $t->id) }}" method="POST" style="display:inline;">
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