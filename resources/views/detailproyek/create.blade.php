@extends('layout.main')
@section('title', 'Tambah Detail Proyek')

@section('content')
<div class="container">
    <form action="{{ route('detailproyek.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Proyek</label>
            <select name="proyek_id" class="form-control" required>
                <option value="">Pilih Proyek</option>
                @foreach($proyeks as $proyek)
                    <option value="{{ $proyek->id }}">{{ $proyek->NamaProyek }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Bahan</label>
            <select name="bahan_id" class="form-control" required>
                <option value="">Pilih Bahan</option>
                @foreach($bahans as $bahan)
                    <option value="{{ $bahan->id }}">{{ $bahan->NamaBahan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Volume</label>
            <input type="text" name="volume" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Pekerjaan</label>
            <select name="pekerjaan_id" class="form-control" required>
                <option value="">Pilih Pekerjaan</option>
                @foreach($pekerjaans as $pekerjaan)
                    <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->NamaPekerjaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Total Biaya</label>
            <input type="text" name="TotalBiaya" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('detailproyek.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection