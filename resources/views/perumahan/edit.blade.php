@extends('layout.main')
@section('title', 'Edit Perumahan')

@section('content')
<div class="container">
    <form action="{{ route('perumahan.update', $perumahan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="TipePerumahan" class="form-label">Tipe Perumahan</label>
            <input type="text" class="form-control" id="TipePerumahan" name="TipePerumahan" value="{{ old('TipePerumahan', $perumahan->TipePerumahan) }}" required>
        </div>
        <div class="mb-3">
            <label for="Lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="Lokasi" name="Lokasi" value="{{ old('Lokasi', $perumahan->Lokasi) }}" required>
        </div>
        <div class="mb-3">
            <label for="Gambarperumahan" class="form-label">Gambar Perumahan</label>
            @if($perumahan->Gambarperumahan)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $perumahan->Gambarperumahan) }}" alt="Gambar Perumahan" width="150">
                </div>
            @endif
            <input type="file" class="form-control" id="Gambarperumahan" name="Gambarperumahan">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('perumahan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection