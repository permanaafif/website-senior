<?php

namespace App\Exports;

use App\Models\NilaiAkhir;
use Maatwebsite\Excel\Concerns\FromCollection;

class NilaiAkhirExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NilaiAkhir::with('mahasiswa','matakuliah')->get()->map(function ($item) {
            return [
                'Nama Mahasiswa' => $item->mahasiswa->nama, // Ganti dengan nama kolom aktual
                'Mata Kuliah' => $item->matakuliah->matkul,
                'Kompetensi' => $item->kompetensi,
                'Sikap' => $item->sikap,
                'Tugas' => $item->tugas,
                'Nilai Akhir' => $item->nilaiakhir
                // Tambahkan kolom-kolom lain sesuai kebutuhan
            ];
        });

    }
    public function headings(): array
    {
        return [
            'Nama Mahasiswa',
            'Mata Kuliah',
            'Kompetensi',
            'Sikap',
            'Tugas',
            'Nilai Akhir',
            // Tambahkan judul kolom lain sesuai kebutuhan
        ];
    }
}
