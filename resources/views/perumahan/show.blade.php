@extends('layout.main')
@section('title', 'Detail Perumahan')

@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>Tipe Perumahan</th>
            <td>{{ $perumahan->TipePerumahan }}</td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td>{{ $perumahan->Lokasi }}</td>
        </tr>
        <tr>
            <th>Gambar Perumahan</th>
            <td>
                @if($perumahan->Gambarperumahan)
                    <img src="{{ asset('storage/' . $perumahan->Gambarperumahan) }}" alt="Gambar Perumahan" width="200">
                @else
                    Tidak ada gambar
                @endif
            </td>
        </tr>
    </table>
    <a href="{{ route('perumahan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection