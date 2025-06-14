@extends('layout.main')
@section('title', 'Detail Perumahan')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Detail Perumahan
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Nama Perumahan:</strong> {{ $perumahan->NamaPerumahan }}</p>
            <p class="card-text"><strong>Tipe Perumahan:</strong> {{ $perumahan->TipePerumahan }}</p>
            <p class="card-text">
                <strong>Gambar Perumahan:</strong><br>
                @if($perumahan->GambarPerumahan)
                    <img src="{{ asset('storage/' . $perumahan->GambarPerumahan) }}" width="250" alt="Gambar Perumahan">
                @else
                    Tidak ada gambar
                @endif
            </p>
            <a href="{{ route('perumahan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection