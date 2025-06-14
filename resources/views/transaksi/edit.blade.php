@extends('layout.main')
@section('title', 'Edit Transaksi')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" value="{{ old('namaPelanggan', $transaksi->namaPelanggan) }}" required>
                </div>

                <div class="mb-3">
                    <label for="notelp" class="form-label">No. Telp</label>
                    <input type="text" class="form-control" id="notelp" name="notelp" value="{{ old('notelp', $transaksi->notelp) }}" required>
                </div>

                <div class="mb-3">
                    <label for="perumahan_id" class="form-label">Perumahan</label>
                    <select class="form-select" id="perumahan_id" name="perumahan_id" required>
                        <option value="">Pilih Perumahan</option>
                        @foreach($perumahan as $p)
                            <option value="{{ $p->id }}" {{ old('perumahan_id', $transaksi->perumahan_id) == $p->id ? 'selected' : '' }}>
                                {{ $p->NamaPerumahan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="karyawan_id" class="form-label">Dicatat Oleh</label>
                    <select class="form-select" id="karyawan_id" name="karyawan_id" required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($karyawan as $k)
                            <option value="{{ $k->id }}" {{ old('karyawan_id', $transaksi->karyawan_id) == $k->id ? 'selected' : '' }}>
                                {{ $k->NamaKaryawan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="Harga" name="Harga" value="{{ old('Harga', $transaksi->Harga) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection