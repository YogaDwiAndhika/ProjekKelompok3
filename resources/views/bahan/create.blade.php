@extends('layout.main')
@section('title', 'Tambah Bahan')

@section('content')
<div class="container">
    <form action="{{ route('bahan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="NamaBahan" class="form-label">Nama Bahan</label>
            <input type="text" class="form-control" id="NamaBahan" name="NamaBahan" required>
        </div>
        <div class="mb-3">
            <label for="Satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="Satuan" name="Satuan" required>
        </div>
        <div class="mb-3">
            <label for="HargaSatuan" class="form-label">Harga Satuan</label>
            <input type="text" class="form-control" id="HargaSatuan" name="HargaSatuan" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection