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
            'TipePerumahan' => 'required|string|max:255',
            'Lokasi' => 'required|string|max:255',
            'Gambarperumahan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('Gambarperumahan')) {
            $validated['Gambarperumahan'] = $request->file('Gambarperumahan')->store('perumahan', 'public');
        }

        Perumahan::create($validated);

        return redirect()->route('perumahan.index')->with('success', 'Data perumahan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function show(Perumahan $perumahan)
    {
        return view('perumahan.show', compact('perumahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perumahan $perumahan)
    {
        return view('perumahan.edit', compact('perumahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perumahan $perumahan)
    {
        $validated = $request->validate([
            'TipePerumahan' => 'required|string|max:255',
            'Lokasi' => 'required|string|max:255',
            'Gambarperumahan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('Gambarperumahan')) {
            // Hapus gambar lama jika ada
            if ($perumahan->Gambarperumahan && Storage::disk('public')->exists($perumahan->Gambarperumahan)) {
                Storage::disk('public')->delete($perumahan->Gambarperumahan);
            }
            $validated['Gambarperumahan'] = $request->file('Gambarperumahan')->store('perumahan', 'public');
        } else {
            unset($validated['Gambarperumahan']);
        }

        $perumahan->update($validated);

        return redirect()->route('perumahan.index')->with('success', 'Data perumahan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perumahan  $perumahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perumahan $perumahan)
    {
        if ($perumahan->Gambarperumahan && Storage::disk('public')->exists($perumahan->Gambarperumahan)) {
            Storage::disk('public')->delete($perumahan->Gambarperumahan);
        }
        $perumahan->delete();

        return redirect()->route('perumahan.index')->with('success', 'Data perumahan berhasil dihapus.');
    }
}
