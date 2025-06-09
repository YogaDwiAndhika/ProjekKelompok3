@extends('layout.main')
@section('title', 'Edit Bahan')

@section('content')
<div class="container">
    <form action="{{ route('bahan.update', $bahan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="NamaBahan" class="form-label">Nama Bahan</label>
            <input type="text" class="form-control" id="NamaBahan" name="NamaBahan" value="{{ old('NamaBahan', $bahan->NamaBahan) }}" required>
        </div>
        <div class="mb-3">
            <label for="VolumeBahan" class="form-label">Volume Bahan</label>
            <input type="text" class="form-control" id="VolumeBahan" name="VolumeBahan" value="{{ old('VolumeBahan', $bahan->VolumeBahan) }}">
        </div>
        <div class="mb-3">
            <label for="Harga" class="form-label">Harga</label>
            <input type="text" class="form-control" id="Harga" name="Harga" value="{{ old('Harga', $bahan->Harga) }}">
        </div>
        <div class="mb-3">
            <label for="Pekerjaan_id" class="form-label">Pekerjaan</label>
            <select class="form-select" id="Pekerjaan_id" name="Pekerjaan_id" required>
                <option value="">Pilih Pekerjaan</option>
                @foreach($pekerjaans as $pekerjaan)
                    <option value="{{ $pekerjaan->id }}" {{ $bahan->Pekerjaan_id == $pekerjaan->id ? 'selected' : '' }}>
                        {{ $pekerjaan->NamaPekerjaan }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('bahan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection