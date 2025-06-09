<?php

namespace App\Http\Controllers;

use App\Models\Tahapan;
use App\Models\Bahan;
use App\Models\Pekerjaan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TahapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahapan = Tahapan::all();
        $bahan = Bahan::all();
        $pekerjaan = Pekerjaan::all();
        $transaksi = Transaksi::all();
        return view('tahapan.index', compact('tahapan', 'bahan', 'pekerjaan', 'transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bahan = Bahan::all();
        $pekerjaan = Pekerjaan::all();
        $transaksi = Transaksi::all();
        return view('tahapan.create', compact('bahan', 'pekerjaan', 'transaksi'));
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
            'deskripsi_tahapan' => 'required|string',
            'volume' => 'nullable|string',
            'bahan_id' => 'required|exists:bahan,id',
            'pekerjaan_id' => 'required|exists:pekerjaan,id',
            'status' => 'required|string',
            'TotalUpah' => 'nullable|string',
            'transaksi_id' => 'required|exists:transaksi,id',
        ]);

        Tahapan::create([
            'deskripsi_tahapan' => $request->deskripsi_tahapan,
            'volume' => $request->volume,
            'bahan_id' => $request->bahan_id,
            'pekerjaan_id' => $request->pekerjaan_id,
            'status' => $request->status,
            'TotalUpah' => $request->TotalUpah,
            'transaksi_id' => $request->transaksi_id,
        ]);

        return redirect()->route('tahapan.index')->with('success', 'Data tahapan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tahapan  $tahapan
     * @return \Illuminate\Http\Response
     */
    public function show(Tahapan $tahapan)
    {
        $tahapan->load(['bahan', 'pekerjaan', 'transaksi']);
        return view('tahapan.show', compact('tahapan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tahapan  $tahapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tahapan $tahapan)
    {
        $bahan = Bahan::all();
        $pekerjaan = Pekerjaan::all();
        $transaksi = Transaksi::all();
        return view('tahapan.edit', compact('tahapan', 'bahan', 'pekerjaan', 'transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tahapan  $tahapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tahapan $tahapan)
    {
        $request->validate([
            'deskripsi_tahapan' => 'required|string',
            'volume' => 'nullable|string',
            'bahan_id' => 'required|exists:bahan,id',
            'pekerjaan_id' => 'required|exists:pekerjaan,id',
            'status' => 'required|string',
            'TotalUpah' => 'nullable|string',
            'transaksi_id' => 'required|exists:transaksi,id',
        ]);

        $tahapan->update([
            'deskripsi_tahapan' => $request->deskripsi_tahapan,
            'volume' => $request->volume,
            'bahan_id' => $request->bahan_id,
            'pekerjaan_id' => $request->pekerjaan_id,
            'status' => $request->status,
            'TotalUpah' => $request->TotalUpah,
            'transaksi_id' => $request->transaksi_id,
        ]);

        return redirect()->route('tahapan.index')->with('success', 'Data tahapan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tahapan  $tahapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tahapan $tahapan)
    {
        $tahapan->delete();
        return redirect()->route('tahapan.index')->with('success', 'Data tahapan berhasil dihapus.');
    }
}
