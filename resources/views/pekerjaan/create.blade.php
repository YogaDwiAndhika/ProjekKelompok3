@extends('layout.main')
@section('title', 'Tambah Pekerjaan')

@section('content')
<div class="container">
    <form action="{{ route('pekerjaan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="NamaPekerjaan" class="form-label">Nama Pekerjaan</label>
            <input type="text" class="form-control" id="NamaPekerjaan" name="NamaPekerjaan" required>
        </div>
        <div class="mb-3">
            <label for="Satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="Satuan" name="Satuan" required>
        </div>
        <div class="mb-3">
            <label for="Upah" class="form-label">Upah</label>
            <input type="text" class="form-control" id="Upah" name="Upah" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pekerjaan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection