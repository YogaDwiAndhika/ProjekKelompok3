<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Cara 1 SQL Query
        $proyek = DB::select('SELECT status, COUNT(*) AS jumlah_proyek FROM proyek GROUP BY status;');
        // Tampilkan halaman dashboard
        return view('dashboard.index', compact('proyek'));
    }
}