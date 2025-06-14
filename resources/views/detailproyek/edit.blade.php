@extends('layout.main')
@section('title', 'Edit Detail Proyek')

@section('content')
<div class="container">
    <form action="{{ route('detailproyek.update', $detailProyek->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Proyek</label>
            <select name="proyek_id" class="form-control" required>
                @foreach($proyeks as $proyek)
                    <option value="{{ $proyek->id }}" {{ $detailProyek->proyek_id == $proyek->id ? 'selected' : '' }}>
                        {{ $proyek->NamaProyek }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Bahan</label>
            <select name="bahan_id" class="form-control" required>
                @foreach($bahans as $bahan)
                    <option value="{{ $bahan->id }}" {{ $detailProyek->bahan_id == $bahan->id ? 'selected' : '' }}>
                        {{ $bahan->NamaBahan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Volume</label>
            <input type="text" name="volume" class="form-control" value="{{ $detailProyek->volume }}" required>
        </div>
        <div class="mb-3">
            <label>Pekerjaan</label>
            <select name="pekerjaan_id" class="form-control" required>
                @foreach($pekerjaans as $pekerjaan)
                    <option value="{{ $pekerjaan->id }}" {{ $detailProyek->pekerjaan_id == $pekerjaan->id ? 'selected' : '' }}>
                        {{ $pekerjaan->NamaPekerjaan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Total Biaya</label>
            <input type="text" name="TotalBiaya" class="form-control" value="{{ $detailProyek->TotalBiaya }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('detailproyek.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection