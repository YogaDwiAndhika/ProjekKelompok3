<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahan = Bahan::all();
        $pekerjaans = Pekerjaan::all();
        return view('bahan.index', compact('bahan', 'pekerjaans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pekerjaans = Pekerjaan::all();
        return view('bahan.create', compact('pekerjaans'));
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
            'NamaBahan' => 'required|string|max:255',
            'VolumeBahan' => 'nullable|string|max:255',
            'Harga' => 'nullable|string|max:255',
            'Pekerjaan_id' => 'required|exists:pekerjaan,id',
        ]);

        Bahan::create([
            'NamaBahan' => $request->NamaBahan,
            'VolumeBahan' => $request->VolumeBahan,
            'Harga' => $request->Harga,
            'Pekerjaan_id' => $request->Pekerjaan_id,
        ]);

        return redirect()->route('bahan.index')->with('success', 'Bahan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function show(Bahan $bahan)
    {
        $bahan->load('pekerjaan');
        return view('bahan.show', compact('bahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahan $bahan)
    {
        $pekerjaans = Pekerjaan::all();
        return view('bahan.edit', compact('bahan', 'pekerjaans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bahan $bahan)
    {
        $request->validate([
            'NamaBahan' => 'required|string|max:255',
            'VolumeBahan' => 'nullable|string|max:255',
            'Harga' => 'nullable|string|max:255',
            'Pekerjaan_id' => 'required|exists:pekerjaan,id',
        ]);

        $bahan->update([
            'NamaBahan' => $request->NamaBahan,
            'VolumeBahan' => $request->VolumeBahan,
            'Harga' => $request->Harga,
            'Pekerjaan_id' => $request->Pekerjaan_id,
        ]);

        return redirect()->route('bahan.index')->with('success', 'Bahan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bahan $bahan)
    {
        $bahan->delete();
        return redirect()->route('bahan.index')->with('success', 'Bahan berhasil dihapus.');
    }
}
