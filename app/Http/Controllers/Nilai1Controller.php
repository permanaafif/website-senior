<?php

namespace App\Http\Controllers;
use App\Models\Nilai;


use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::paginate(10);
        $title = "NilaiMahasiswa";
        return view('nilai.index', compact('nilais','title'));
    }
    public function rataRataTugas()
    {
        $nilaiCount = $this->whereNotNull('tugas')->count();
        $totalTugas = $this->sum('tugas');
        return $nilaiCount > 0 ? $totalTugas / $nilaiCount : 0;
    }

    public function rataRataKuis()
    {
        $nilaiCount = $this->whereNotNull('kuis')->count();
        $totalKuis = $this->sum('kuis');
        return $nilaiCount > 0 ? $totalKuis / $nilaiCount : 0;
    }

    public function rataRataUTS()
    {
        $nilaiCount = $this->whereNotNull('uts')->count();
        $totalUTS = $this->sum('uts');
        return $nilaiCount > 0 ? $totalUTS / $nilaiCount : 0;
    }

    public function rataRataUAS()
    {
        $nilaiCount = $this->whereNotNull('uas')->count();
        $totalUAS = $this->sum('uas');
        return $nilaiCount > 0 ? $totalUAS / $nilaiCount : 0;
    }

    public function rataRataSikap()
    {
        $nilaiCount = $this->whereNotNull('sikap')->count();
        $totalSikap = $this->sum('sikap');
        return $nilaiCount > 0 ? $totalSikap / $nilaiCount : 0;
    }
}
