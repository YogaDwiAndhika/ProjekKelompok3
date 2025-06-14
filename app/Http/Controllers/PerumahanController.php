<?php

namespace App\Http\Controllers;

use App\Models\Perumahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerumahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perumahan = Perumahan::all();
        return view('perumahan.index', compact('perumahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perumahan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'NamaPerumahan' => 'required|string|max:255',
            'TipePerumahan' => 'required|string|max:255',
            'GambarPerumahan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('GambarPerumahan')) {
            $validated['GambarPerumahan'] = $request->file('GambarPerumahan')->store('perumahan', 'public');
        }

        Perumahan::create($validated);

        return redirect()->route('perumahan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perumahan = Perumahan::findOrFail($id);
        return view('perumahan.show', compact('perumahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perumahan = Perumahan::findOrFail($id);
        return view('perumahan.edit', compact('perumahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'NamaPerumahan' => 'required|string|max:255',
            'TipePerumahan' => 'required|string|max:255',
            'GambarPerumahan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $perumahan = Perumahan::findOrFail($id);

        if ($request->hasFile('GambarPerumahan')) {
            // Hapus gambar lama jika ada
            if ($perumahan->GambarPerumahan && Storage::disk('public')->exists($perumahan->GambarPerumahan)) {
                Storage::disk('public')->delete($perumahan->GambarPerumahan);
            }
            $validated['GambarPerumahan'] = $request->file('GambarPerumahan')->store('perumahan', 'public');
        }

        $perumahan->update($validated);

        return redirect()->route('perumahan.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perumahan = Perumahan::findOrFail($id);
        if ($perumahan->GambarPerumahan && Storage::disk('public')->exists($perumahan->GambarPerumahan)) {
            Storage::disk('public')->delete($perumahan->GambarPerumahan);
        }
        $perumahan->delete();

        return redirect()->route('perumahan.index')->with('success', 'Data berhasil dihapus!');
    }
}
