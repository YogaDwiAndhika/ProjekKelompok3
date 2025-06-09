@extends('layout.main')
@section('title', 'Edit Pekerjaan')

@section('content')
<div class="container">
    <form action="{{ route('pekerjaan.update', $pekerjaan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="NamaPekerjaan" class="form-label">Nama Pekerjaan</label>
            <input type="text" class="form-control" id="NamaPekerjaan" name="NamaPekerjaan" value="{{ old('NamaPekerjaan', $pekerjaan->NamaPekerjaan) }}" required>
        </div>
        <div class="mb-3">
            <label for="DeskripsiPekerjaan" class="form-label">Deskripsi Pekerjaan</label>
            <input type="text" class="form-control" id="DeskripsiPekerjaan" name="DeskripsiPekerjaan" value="{{ old('DeskripsiPekerjaan', $pekerjaan->DeskripsiPekerjaan) }}" required>
        </div>
        <div class="mb-3">
            <label for="Gaji" class="form-label">Gaji</label>
            <input type="number" class="form-control" id="Gaji" name="Gaji" value="{{ old('Gaji', $pekerjaan->Gaji) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pekerjaan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection