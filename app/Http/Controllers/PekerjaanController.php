<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::all();
        return view('pekerjaan.index', compact('pekerjaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pekerjaan.create');
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
            'NamaPekerjaan' => 'required|string|max:255',
            'DeskripsiPekerjaan' => 'required|string|max:255',
            'Gaji' => 'nullable|integer',
        ]);

        Pekerjaan::create([
            'NamaPekerjaan' => $request->NamaPekerjaan,
            'DeskripsiPekerjaan' => $request->DeskripsiPekerjaan,
            'Gaji' => $request->Gaji,
        ]);

        return redirect()->route('pekerjaan.index')->with('success', 'Data pekerjaan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pekerjaan $pekerjaan)
    {
        return view('pekerjaan.show', compact('pekerjaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerjaan $pekerjaan)
    {
        return view('pekerjaan.edit', compact('pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $request->validate([
            'NamaPekerjaan' => 'required|string|max:255',
            'DeskripsiPekerjaan' => 'required|string|max:255',
            'Gaji' => 'nullable|integer',
        ]);

        $pekerjaan->update([
            'NamaPekerjaan' => $request->NamaPekerjaan,
            'DeskripsiPekerjaan' => $request->DeskripsiPekerjaan,
            'Gaji' => $request->Gaji,
        ]);

        return redirect()->route('pekerjaan.index')->with('success', 'Data pekerjaan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pekerjaan $pekerjaan)
    {
        $pekerjaan->delete();
        return redirect()->route('pekerjaan.index')->with('success', 'Data pekerjaan berhasil dihapus.');
    }
}
