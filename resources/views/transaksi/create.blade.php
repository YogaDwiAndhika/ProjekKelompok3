@extends('layout.main')
@section('title', 'Tambah Transaksi')

@section('content')
<div class="container">
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="namapelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="namapelanggan" name="namaPelanggan" required>
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
                    <option value="{{ $p->id }}">{{ $p->NamaPerumahan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="karyawan_id" class="form-label">Dicatat Oleh</label>
            <select class="form-control" id="karyawan_id" name="karyawan_id" required>
                <option value="">-- Pilih Karyawan --</option>
                @foreach($karyawan as $k)
                    <option value="{{ $k->id }}">{{ $k->NamaKaryawan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="Harga" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection