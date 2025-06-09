@extends('layout.main')
@section('title', 'Tambah Perumahan')

@section('content')
<div class="container">
    <form action="{{ route('perumahan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="TipePerumahan" class="form-label">Tipe Perumahan</label>
            <input type="text" name="TipePerumahan" class="form-control @error('TipePerumahan') is-invalid @enderror" id="TipePerumahan" value="{{ old('TipePerumahan') }}" required>
            @error('TipePerumahan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Lokasi" class="form-label">Lokasi</label>
            <input type="text" name="Lokasi" class="form-control @error('Lokasi') is-invalid @enderror" id="Lokasi" value="{{ old('Lokasi') }}" required>
            @error('Lokasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="Gambarperumahan" class="form-label">Gambar Perumahan</label>
            <input type="file" name="Gambarperumahan" class="form-control @error('Gambarperumahan') is-invalid @enderror" id="Gambarperumahan" accept="image/*">
            @error('Gambarperumahan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('perumahan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection