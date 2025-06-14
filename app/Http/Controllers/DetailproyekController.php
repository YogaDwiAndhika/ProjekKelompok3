<?php

namespace App\Http\Controllers;

use App\Models\detailproyek;
use App\Models\proyek;
use App\Models\Bahan;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class DetailProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailProyek = detailproyek::all();
        return view('detailproyek.index')->with('detailProyek', $detailProyek);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyeks = proyek::all();
        $bahans = Bahan::all();
        $pekerjaans = Pekerjaan::all();
        return view('detailproyek.create', compact('proyeks', 'bahans', 'pekerjaans'));
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
            'proyek_id' => 'required|exists:proyek,id',
            'bahan_id' => 'required|exists:bahan,id',
            'volume' => 'required|string',
            'pekerjaan_id' => 'required|exists:pekerjaan,id',
            'TotalBiaya' => 'required|string',
        ]);

        DetailProyek::create($request->all());
        return redirect()->route('detailproyek.index')->with('success', 'Detail Proyek berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detailproyek  $detailproyek
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailProyek = DetailProyek::with(['proyek', 'bahan', 'pekerjaan'])->findOrFail($id);
        return view('detailproyek.show', compact('detailProyek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detailproyek  $detailproyek
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailProyek = DetailProyek::findOrFail($id);
        $proyeks = proyek::all();
        $bahans = Bahan::all();
        $pekerjaans = Pekerjaan::all();
        return view('detailproyek.edit', compact('detailProyek', 'proyeks', 'bahans', 'pekerjaans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detailproyek  $detailproyek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'proyek_id' => 'required|exists:proyek,id',
            'bahan_id' => 'required|exists:bahan,id',
            'volume' => 'required|string',
            'pekerjaan_id' => 'required|exists:pekerjaan,id',
            'TotalBiaya' => 'required|string',
        ]);

        $detailProyek = DetailProyek::findOrFail($id);

        if($request->user()->cannot('update', $detailProyek)) {
            abort(403, 'Unauthorized action.');
        }

        $detailProyek->update($request->all());

        return redirect()->route('detailproyek.index')->with('success', 'Detail Proyek berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detailproyek  $detailproyek
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailProyek = DetailProyek::findOrFail($id);
        $detailProyek->delete();

        return redirect()->route('detailproyek.index')->with('success', 'Data berhasil dihapus.');
    }
}
