<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // Tampilkan daftar karyawan
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    // Tampilkan form tambah karyawan
    public function create()
    {
        return view('karyawan.create');
    }

    // Simpan data karyawan baru
    public function store(Request $request)
    {
        $request->validate([
            'NamaKaryawan' => 'required|string|max:255',
            'JenisKelamin' => 'required|string',
            'NoTelepon' => 'required|string|max:20',
            'Divisi' => 'required|string|max:100',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    // Tampilkan detail karyawan
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    // Tampilkan form edit karyawan
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    // Update data karyawan
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'NamaKaryawan' => 'required|string|max:255',
            'JenisKelamin' => 'required|string',
            'NoTelepon' => 'required|string|max:20',
            'Divisi' => 'required|string|max:100',
        ]);

        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diupdate.');
    }

    // Hapus data karyawan
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}
