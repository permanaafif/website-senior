<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index(Request $request)
{
    $kelas_id = $request->input('kelas_id');
    $matakuliah_id = $request->input('matakuliah_id');

    $filteredData = Mahasiswa::where('kelas_id', $kelas_id)
        ->where('matakuliah_id', $matakuliah_id)
        ->get();

    return view('filter.index', compact('filteredData'));
}
}
