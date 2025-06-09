<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Perumahan;
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
        $transaksi = Transaksi::all();
        $perumahan = Perumahan::all();
        return view('transaksi.index', compact('transaksi', 'perumahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perumahan = Perumahan::all();
        return view('transaksi.create', compact('perumahan'));
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
            'namapelanggan' => 'required|string|max:255',
            'notelp' => 'required|string|max:20',
            'perumahan_id' => 'required|exists:perumahan,id',
        ]);

        Transaksi::create([
            'namapelanggan' => $request->namapelanggan,
            'notelp' => $request->notelp,
            'perumahan_id' => $request->perumahan_id,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        $transaksi->load('perumahan');
        return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $perumahan = Perumahan::all();
        return view('transaksi.edit', compact('transaksi', 'perumahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'namapelanggan' => 'required|string|max:255',
            'notelp' => 'required|string|max:20',
            'perumahan_id' => 'required|exists:perumahan,id',
        ]);

        $transaksi->update([
            'namapelanggan' => $request->namapelanggan,
            'notelp' => $request->notelp,
            'perumahan_id' => $request->perumahan_id,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
