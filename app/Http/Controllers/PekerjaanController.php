<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;

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
        if($request->user()->cannot('create', Pekerjaan::class)) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'NamaPekerjaan' => 'required|string',
            'Satuan' => 'required|string',
            'Upah' => 'required|string',
        ]);

        Pekerjaan::create($request->all());

        return redirect()->route('pekerjaan.index')->with('success', 'Data pekerjaan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        return view('pekerjaan.show', compact('pekerjaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        return view('pekerjaan.edit', compact('pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaPekerjaan' => 'required|string',
            'Satuan' => 'required|string',
            'Upah' => 'required|string',
        ]);

        $pekerjaan = Pekerjaan::findOrFail($id);
        if($request->user()->cannot('update', $pekerjaan)) {
            abort(403, 'Unauthorized action.');
        }
        $pekerjaan->update($request->all());

        return redirect()->route('pekerjaan.index')->with('success', 'Data pekerjaan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        if(request()->user()->cannot('delete', $pekerjaan)) {
            abort(403, 'Unauthorized action.');
        }
        $pekerjaan->delete();

        return redirect()->route('pekerjaan.index')->with('success', 'Data pekerjaan berhasil dihapus.');
    }
}
