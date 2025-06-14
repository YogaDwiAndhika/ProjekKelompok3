<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Perumahan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::with(['perumahan', 'karyawan'])->get();
        return view('transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perumahan = Perumahan::all();
        $karyawan = Karyawan::all();
        return view('transaksi.create', compact('perumahan', 'karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaPelanggan' => 'required|string|max:255',
            'notelp' => 'required|string|max:20',
            'perumahan_id' => 'required|exists:perumahan,id',
            'karyawan_id' => 'required|exists:karyawan,id',
            'Harga' => 'required|string|max:255',
        ]);

        Transaksi::create([
            'namaPelanggan' => $request->namaPelanggan,
            'notelp' => $request->notelp,
            'perumahan_id' => $request->perumahan_id,
            'karyawan_id' => $request->karyawan_id,
            'Harga' => $request->Harga,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::with(['perumahan', 'karyawan'])->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $perumahan = Perumahan::all();
        $karyawan = Karyawan::all();
        return view('transaksi.edit', compact('transaksi', 'perumahan', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaPelanggan' => 'required|string|max:255',
            'notelp' => 'required|string|max:20',
            'perumahan_id' => 'required|exists:perumahan,id',
            'karyawan_id' => 'required|exists:karyawan,id',
            'Harga' => 'required|string|max:255',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'namaPelanggan' => $request->namaPelanggan,
            'notelp' => $request->notelp,
            'perumahan_id' => $request->perumahan_id,
            'karyawan_id' => $request->karyawan_id,
            'Harga' => $request->Harga,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
