@extends('layout.main')
@section('title', 'Tambah Tahapan')

@section('content')
<div class="container">
    <form action="{{ route('tahapan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="deskripsi_tahapan" class="form-label">Deskripsi Tahapan</label>
            <input type="text" class="form-control" id="deskripsi_tahapan" name="deskripsi_tahapan" required>
        </div>
        <div class="mb-3">
            <label for="volume" class="form-label">Volume</label>
            <input type="text" class="form-control" id="volume" name="volume">
        </div>
        <div class="mb-3">
            <label for="bahan_id" class="form-label">Bahan</label>
            <select class="form-control" id="bahan_id" name="bahan_id" required>
                <option value="">-- Pilih Bahan --</option>
                @foreach($bahan as $b)
                    <option value="{{ $b->id }}">{{ $b->NamaBahan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="pekerjaan_id" class="form-label">Pekerjaan</label>
            <select class="form-control" id="pekerjaan_id" name="pekerjaan_id" required>
                <option value="">-- Pilih Pekerjaan --</option>
                @foreach($pekerjaan as $p)
                    <option value="{{ $p->id }}">{{ $p->NamaPekerjaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="belum selesai" selected>Belum Selesai</option>
                <option value="sedang dikerjakan">Sedang Dikerjakan</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="TotalUpah" class="form-label">Total Upah</label>
            <input type="text" class="form-control" id="TotalUpah" name="TotalUpah">
        </div>
        <div class="mb-3">
            <label for="transaksi_id" class="form-label">Transaksi</label>
            <select class="form-control" id="transaksi_id" name="transaksi_id" required>
                <option value="">-- Pilih Transaksi --</option>
                @foreach($transaksi as $tr)
                    <option value="{{ $tr->id }}">{{ $tr->id }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tahapan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection