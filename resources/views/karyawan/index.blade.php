@extends('layout.main')
@section('title', 'Daftar Karyawan')

@section('content')
<div class="container">
    @can('create', App\Models\Karyawan::class)
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>
    @endcan
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Jenis Kelamin</th>
                <th>No Telepon</th>
                <th>Divisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($karyawan as $item)
            <tr>
                <td>{{ $item->NamaKaryawan }}</td>
                <td>{{ $item->JenisKelamin }}</td>
                <td>{{ $item->NoTelepon }}</td>
                <td>{{ $item->Divisi }}</td>
                <td>
                        <a href="{{ route('karyawan.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    @can('update', $item)
                        <a href="{{ route('karyawan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @endcan
                    @can('delete', $item)
                        <form action="{{ route('karyawan.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data karyawan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection