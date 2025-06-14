@extends('layout.main')
@section('title', 'Edit Perumahan')

@section('content')
<div class="container">
    <form action="{{ route('perumahan.update', $perumahan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="NamaPerumahan" class="form-label">Nama Perumahan</label>
            <input type="text" class="form-control" id="NamaPerumahan" name="NamaPerumahan" value="{{ $perumahan->NamaPerumahan }}" required>
        </div>
        <div class="mb-3">
            <label for="TipePerumahan" class="form-label">Tipe Perumahan</label>
            <input type="text" class="form-control" id="TipePerumahan" name="TipePerumahan" value="{{ $perumahan->TipePerumahan }}" required>
        </div>
        <div class="mb-3">
            <label for="GambarPerumahan" class="form-label">Gambar Perumahan</label>
            @if($perumahan->GambarPerumahan)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $perumahan->GambarPerumahan) }}" width="120" alt="Gambar Lama">
                </div>
            @endif
            <input type="file" class="form-control" id="GambarPerumahan" name="GambarPerumahan" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('perumahan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection