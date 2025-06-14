@extends('layout.main')
@section('title', 'Detail Karyawan')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>Nama Karyawan:</strong> {{ $karyawan->NamaKaryawan }}</p>
            <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $karyawan->JenisKelamin }}</p>
            <p class="card-text"><strong>No Telepon:</strong> {{ $karyawan->NoTelepon }}</p>
            <p class="card-text"><strong>Divisi:</strong> {{ $karyawan->Divisi }}</p>
        </div>
    </div>
    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning mt-3">Edit</a>
</div>
@endsection