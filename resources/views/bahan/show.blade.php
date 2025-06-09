@extends('layout.main')
@section('title', 'Detail Bahan')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $bahan->NamaBahan }}</h5> <br><br>
            <p class="card-text"><strong>Volume Bahan:</strong> {{ $bahan->VolumeBahan ?? '-' }}</p>
            <p class="card-text"><strong>Harga:</strong> {{ $bahan->Harga ?? '-' }}</p>
            <p class="card-text"><strong>Pekerjaan:</strong> {{ $bahan->pekerjaan->NamaPekerjaan ?? '-' }}</p>
            <p class="card-text"><strong>Dibuat:</strong> {{ $bahan->created_at }}</p>
            <p class="card-text"><strong>Diupdate:</strong> {{ $bahan->updated_at }}</p>
            <a href="{{ route('bahan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection