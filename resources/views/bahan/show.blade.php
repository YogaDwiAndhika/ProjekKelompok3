@extends('layout.main')
@section('title', 'Detail Bahan')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>Nama Bahan:</strong> {{ $bahan->NamaBahan }}</p>
            <p class="card-text"><strong>Satuan:</strong> {{ $bahan->Satuan }}</p>
            <p class="card-text"><strong>Harga Satuan:</strong> {{ $bahan->HargaSatuan }}</p>
            <a href="{{ route('bahan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection