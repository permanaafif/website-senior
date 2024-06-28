<?php

namespace App\Http\Controllers\Rps;

use App\Http\Controllers\Controller;
use App\Models\Capaian;
use App\Models\Dosen;
use App\Models\Judul;
use App\Models\Kajian;
use App\Models\Kontent;
use App\Models\Metode;
use App\Models\Subjudul;
use App\Models\Target;
use App\Models\MataKuliah;
use Barryvdh\DomPDF\Facade\Pdf;

class RpsCetakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rps.cetak-rps.index', [
            'dosens' => Dosen::latest()->get(),
        ]);
    }

    public function show($id)
    {
        // $cetaks = Dosen::find($id);
        $cetaks = MataKuliah::where('dosen_id',);

        // Capaian Pembelajaran
        $judulss = Judul::all();
        $juduls = Judul::where('dosen_id', $id)
            ->where('nama_judul', 'CAPAIAN PEMBELAJARAN (CP)')
            ->get();
        $subjuduls = Subjudul::where('dosen_id', $id)->get();
        $kontens = Kontent::where('dosen_id', $id)->get();
        $capaians = Capaian::where('dosen_id', $id)->get();
        $targets = Target::where('dosen_id', $id)->get();
        $kajians = Kajian::where('dosen_id', $id)->get();
        $metodes = Metode::where('dosen_id', $id)->first();

        $judulCounts = $judulss->count() + 1;
        $subjudulCounts = $subjuduls->count();
        $capaianCounts = $capaians->count();
        $kontensCounts = $kontens->count();

        $counts = $subjudulCounts + $capaianCounts + $kontensCounts - $judulCounts;

        // Judul 2
        $juduls2s = Judul::where('dosen_id', $id)
            ->where('nama_judul', 'DESKRIPSI MATA KULIAH')
            ->get();

        // Judul 3
        $juduls3s = Judul::where('dosen_id', $id)
            ->where('nama_judul', 'BAHAN KAJIAN/MATERI')
            ->get();

        // Judul 4
        $juduls4s = Judul::where('dosen_id', $id)
            ->where('nama_judul', 'PUSTAKA')
            ->get();

        // Judul 5
        $juduls5s = Judul::where('dosen_id', $id)
            ->where('nama_judul', 'TEAM TEACHING')
            ->get();

        $pdf = PDF::loadView('rps.cetak-rps.cetak-rps', compact('juduls5s', 'juduls4s', 'juduls3s', 'metodes', 'kajians', 'cetaks', 'juduls', 'juduls2s', 'subjuduls', 'kontens', 'capaians', 'counts', 'targets'));
        return $pdf->stream('rps.pdf');
    }

}
