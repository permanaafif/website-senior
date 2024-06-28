<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::all();
        $jumlahTugas = $tugas->count('tugas');
        $jumlahKuis = $tugas->count('kuis');
        $jumlahUts = $tugas->count('uts');
        $jumlahUas = $tugas->count('uas');
        $totalTugas = $tugas->sum('tugas');
        $totalKuis = $tugas->sum('kuis');
        $totalUts = $tugas->sum('uts');
        $totalUas = $tugas->sum('uas');
        $rataRataTugas = ($jumlahTugas > 0) ? $totalTugas / $jumlahTugas : 0;
        $rataRataKuis = ($jumlahKuis > 0) ? $totalKuis / $jumlahKuis : 0;
        $rataRataUts = ($jumlahUts > 0) ? $totalUts / $jumlahUts : 0;
        $rataRataUas = ($jumlahUas> 0) ? $totalUas / $jumlahUas : 0;

        return view('tugas.index', compact('tugas','rataRataTugas', 'rataRataKuis','rataRataUts','rataRataUas'));
    }

    public function create()
    {
        return view('tugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tugas' => 'numeric',
            'kuis' => 'numeric',
            'uts' => 'numeric',

        ]);

        Tugas::create([
            'tugas' => $request->tugas,
            'kuis' => $request->kuis,
            'uts' => $request->uts,
            'uas' => $request->uas,
        ]);

        return redirect()->route('tugas.index')->with('success', 'Nilai tugas berhasil ditambahkan.');
    }
    public function destroy($id)
    {
        Tugas::destroy($id);
        return redirect('/tugas')->with('pesan', 'Data berhasil dihapus');
    }

}
