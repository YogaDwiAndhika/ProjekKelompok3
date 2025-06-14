<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
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
        return view('bahan.index', compact('bahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bahan.create');
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
            'Satuan' => 'required|string|max:255',
            'HargaSatuan' => 'required|string|max:255',
        ]);

        Bahan::create([
            'NamaBahan' => $request->NamaBahan,
            'Satuan' => $request->Satuan,
            'HargaSatuan' => $request->HargaSatuan,
        ]);

        return redirect()->route('bahan.index')->with('success', 'Bahan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bahan = Bahan::findOrFail($id);
        return view('bahan.show', compact('bahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bahan = Bahan::findOrFail($id);
        return view('bahan.edit', compact('bahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaBahan' => 'required|string|max:255',
            'Satuan' => 'required|string|max:255',
            'HargaSatuan' => 'required|string|max:255',
        ]);

        $bahan = Bahan::findOrFail($id);
        $bahan->update([
            'NamaBahan' => $request->NamaBahan,
            'Satuan' => $request->Satuan,
            'HargaSatuan' => $request->HargaSatuan,
        ]);

        return redirect()->route('bahan.index')->with('success', 'Bahan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bahan  $bahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahan = Bahan::findOrFail($id);
        $bahan->delete();

        return redirect()->route('bahan.index')->with('success', 'Bahan berhasil dihapus.');
    }
}
