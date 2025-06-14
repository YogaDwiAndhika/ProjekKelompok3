@extends('layout.main')
@section('title', 'Tambah Perumahan')

@section('content')
<div class="container">
    <form action="{{ route('perumahan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="NamaPerumahan" class="form-label">Nama Perumahan</label>
            <input type="text" class="form-control" id="NamaPerumahan" name="NamaPerumahan" required>
        </div>
        <div class="mb-3">
            <label for="TipePerumahan" class="form-label">Tipe Perumahan</label>
            <input type="text" class="form-control" id="TipePerumahan" name="TipePerumahan" required>
        </div>
        <div class="mb-3">
            <label for="GambarPerumahan" class="form-label">Gambar Perumahan</label>
            <input type="file" class="form-control" id="GambarPerumahan" name="GambarPerumahan" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('perumahan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection