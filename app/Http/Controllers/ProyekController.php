<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;
use App\Models\Perumahan;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyeks = Proyek::all();
        return view('proyek.index')->with('proyeks', $proyeks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perumahans = Perumahan::all();
        return view('proyek.create', compact('perumahans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->user()->cannot('create', Proyek::class)) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'NamaProyek' => 'required|string|max:255',
            'perumahan_id' => 'required|exists:perumahan,id',
            'TanggalMulai' => 'required|date',
            'TanggalSelesai' => 'required|date|after_or_equal:TanggalMulai',
            'EstimasiBiaya' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        Proyek::create($request->all());
        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyek = Proyek::with('perumahan')->findOrFail($id);
        return view('proyek.show', compact('proyek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyek = Proyek::findOrFail($id);
        $perumahans = Perumahan::all();
        return view('proyek.edit', compact('proyek', 'perumahans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaProyek' => 'required|string|max:255',
            'perumahan_id' => 'required|exists:perumahan,id',
            'TanggalMulai' => 'required|date',
            'TanggalSelesai' => 'required|date|after_or_equal:TanggalMulai',
            'EstimasiBiaya' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $proyek = Proyek::findOrFail($id);

        if($request->user()->cannot('update', $proyek)) {
            abort(403, 'Unauthorized action.');
        }

        $proyek->update($request->all());

        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\proyek  $proyek
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyek = \App\Models\Proyek::findOrFail($id);

        if(request()->user()->cannot('delete', $proyek)) {
            abort(403, 'Unauthorized action.');
        }

        $proyek->delete();
        return redirect()->route('proyek.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
