@extends('layout.main')
@section('title', 'Edit Proyek')

@section('content')
<div class="container">
    <form action="{{ route('proyek.update', $proyek->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Proyek</label>
            <input type="text" name="NamaProyek" class="form-control" value="{{ $proyek->NamaProyek }}" required>
        </div>
        <div class="mb-3">
            <label>Perumahan</label>
            <select name="perumahan_id" class="form-control" required>
                @foreach($perumahans as $perumahan)
                    <option value="{{ $perumahan->id }}" {{ $proyek->perumahan_id == $perumahan->id ? 'selected' : '' }}>
                        {{ $perumahan->NamaPerumahan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="TanggalMulai" class="form-control" value="{{ $proyek->TanggalMulai }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="TanggalSelesai" class="form-control" value="{{ $proyek->TanggalSelesai }}" required>
        </div>
        <div class="mb-3">
            <label>Estimasi Biaya</label>
            <input type="text" name="EstimasiBiaya" class="form-control" value="{{ $proyek->EstimasiBiaya }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="belum selesai" {{ $proyek->status == 'belum selesai' ? 'selected' : '' }}>Belum Selesai</option>
                <option value="sedang berlangsung" {{ $proyek->status == 'sedang berlangsung' ? 'selected' : '' }}>Sedang Berlangsung</option>
                <option value="selesai" {{ $proyek->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('proyek.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection