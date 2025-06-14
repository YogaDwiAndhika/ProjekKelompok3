@extends('layout.main')
@section('title', 'Detail Pekerjaan')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>Nama Pekerjaan:</strong> {{ $pekerjaan->NamaPekerjaan }}</p>
            <p class="card-text"><strong>Satuan:</strong> {{ $pekerjaan->Satuan }}</p>
            <p class="card-text"><strong>Upah:</strong> {{ $pekerjaan->Upah }}</p>
            <a href="{{ route('pekerjaan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection