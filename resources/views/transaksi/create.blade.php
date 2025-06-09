@extends('layout.main')
@section('title', 'Tambah Transaksi')

@section('content')
<div class="container">
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="namapelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="namapelanggan" name="namapelanggan" required>
        </div>
        <div class="mb-3">
            <label for="notelp" class="form-label">No. Telp</label>
            <input type="text" class="form-control" id="notelp" name="notelp" required>
        </div>
        <div class="mb-3">
            <label for="perumahan_id" class="form-label">Perumahan</label>
            <select class="form-control" id="perumahan_id" name="perumahan_id" required>
                <option value="">-- Pilih Perumahan --</option>
                @foreach($perumahan as $p)
                    <option value="{{ $p->id }}">{{ $p->Lokasi }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection