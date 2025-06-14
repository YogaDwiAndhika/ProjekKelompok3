@extends('layout.main')
@section('title', 'Tambah Proyek')

@section('content')
<div class="container">
    <form action="{{ route('proyek.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Proyek</label>
            <input type="text" name="NamaProyek" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Perumahan</label>
            <select name="perumahan_id" class="form-control" required>
                <option value="">-- Pilih Perumahan --</option>
                @foreach($perumahans as $perumahan)
                    <option value="{{ $perumahan->id }}">{{ $perumahan->NamaPerumahan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="TanggalMulai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="TanggalSelesai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Estimasi Biaya</label>
            <input type="text" name="EstimasiBiaya" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="belum selesai">Belum Selesai</option>
                <option value="sedang berlangsung">Sedang Berlangsung</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('proyek.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection