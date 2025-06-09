@extends('layout.main')
@section('title', 'Edit Karyawan')

@section('content')
<div class="container">
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="NamaKaryawan" class="form-label">Nama Karyawan</label>
            <input type="text" class="form-control" id="NamaKaryawan" name="NamaKaryawan" value="{{ old('NamaKaryawan', $karyawan->NamaKaryawan) }}" required>
        </div>
        <div class="mb-3">
            <label for="JenisKelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-control" id="JenisKelamin" name="JenisKelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <option value="Laki-laki" {{ old('JenisKelamin', $karyawan->JenisKelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('JenisKelamin', $karyawan->JenisKelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="NoTelepon" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="NoTelepon" name="NoTelepon" value="{{ old('NoTelepon', $karyawan->NoTelepon) }}" required>
        </div>
        <div class="mb-3">
            <label for="Divisi" class="form-label">Divisi</label>
            <input type="text" class="form-control" id="Divisi" name="Divisi" value="{{ old('Divisi', $karyawan->Divisi) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection