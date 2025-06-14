@extends('layout.main')
@section('title', 'Edit Bahan')

@section('content')
<div class="container">
    <form action="{{ route('bahan.update', $bahan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="NamaBahan" class="form-label">Nama Bahan</label>
            <input type="text" class="form-control" id="NamaBahan" name="NamaBahan" value="{{ $bahan->NamaBahan }}" required>
        </div>
        <div class="mb-3">
            <label for="Satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="Satuan" name="Satuan" value="{{ $bahan->Satuan }}" required>
        </div>
        <div class="mb-3">
            <label for="HargaSatuan" class="form-label">Harga Satuan</label>
            <input type="text" class="form-control" id="HargaSatuan" name="HargaSatuan" value="{{ $bahan->HargaSatuan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('bahan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection