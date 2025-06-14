@extends('layout.main')
@section('title', 'Daftar Bahan')

@section('content')
<div class="container">
    <a href="{{ route('bahan.create') }}" class="btn btn-primary mb-3">Tambah Bahan</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Bahan</th>
                <th>Satuan</th>
                <th>Harga Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bahan as $item)
            <tr>
                <td>{{ $item->NamaBahan }}</td>
                <td>{{ $item->Satuan }}</td>
                <td>{{ $item->HargaSatuan }}</td>
                <td>
                    <a href="{{ route('bahan.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('bahan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('bahan.destroy', $item->id) }}" method="POST" style="display:inline;">
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