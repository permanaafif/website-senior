<?php

namespace App\Http\Controllers;

use App\Models\NilaiAkhir;
use App\Models\NilaiRata;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\NilaiBobot;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangExport;
use App\Exports\NilaiAkhirExport;

class NilaiAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = "Nilai Akhir";
        $mahasiswa = Mahasiswa::all();
        $matakuliah = MataKuliah::all();
        $matakuliah_id = $request->query('mata_kuliah_id');
        $nilaiakhir = NilaiAkhir::where('mata_kuliah_id',$matakuliah_id)->get();
        return view('nilaiakhir', compact('nilaiakhir','title','mahasiswa','matakuliah'));

         // Mendapatkan nilai dari parameter matakuliah_id yang dikirimkan melalui permintaan GET
        //  $matakuliahId = $request->input('mata_kuliah_id');

        //  // Melakukan query berdasarkan matakuliah_id jika diberikan
        //  $query = NilaiAkhir::query();
        //  if ($matakuliahId) {
        //      $query->where('mata_kuliah_id', $matakuliahId);
        //  }

        //  // Mendapatkan hasil query
        //  $nilaiakhir = $query->get();

        //  // Memasukkan data yang diperlukan ke dalam view
        //  return view('nilaiakhir', [
        //      'nilaiakhir' => $nilaiakhir,
        //      'matakuliahId' => $matakuliahId,
        //      // ... tambahkan data lain yang diperlukan
        //  ]);
    }

    public function nilai_mahasiswa(Request $request)
    {
        $nilai_rata_mahasiswa = NilaiRata::where('mahasiswa_id', $request->id)->where('mata_kuliah_id', $request->mata_kuliah_id)->first();
        $nilaibobot_mahasiswa = NilaiBobot::where('mahasiswa_id', $request->id)->where('mata_kuliah_id', $request->mata_kuliah_id)->first();
        $response = [
            'nilai_rata' => $nilai_rata_mahasiswa,
            'nilai_bobot' => $nilaibobot_mahasiswa
        ];
        return response($response);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData= $request->validate([

            'mahasiswa_id' => 'required',
            'mata_kuliah_id' => 'required',
            'sikap' => 'required',
            'tugas' =>'required',
            'kompetensi' =>'required',
            'nilaiakhir' =>'required'


        ]);

       NilaiAkhir::create($validatedData);
       return redirect('/nilaiakhir')->with('pesan', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function previewPDF()
    {
        $nilaiakhir = NilaiAkhir::all();

        $pdf = PDF::loadView('cetaknilaiakhir', ['nilaiakhir'=>$nilaiakhir] );

        return $pdf->stream('preview.pdf');
    }
    public function cetakpdfnilaiakhir($matakuliahId){
        $nilaiakhir = NilaiAkhir::where('matakuliah_id', $matakuliahId)->get();

    	$pdf = PDF::loadview('cetaknilaiakhir',['nilaiakhir'=>$nilaiakhir] );
        return $pdf->download('laporan.pdf');
    }
    public function exportnilaiakhir()
    {
        return Excel::download(new NilaiAkhirExport, 'nilaiakhir.csv');
    }
}
