<?php

namespace App\Http\Controllers;

use App\Models\NilaiMahasiswa;
use App\Models\Mahasiswa;
use App\Models\NilaiBobot;
use Illuminate\Http\Request;


class NilaiMahasiswaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai_mahasiswas = NilaiMahasiswa::paginate(10);
        $title = "NilaiMahasiswa";
        return view('nilaimahasiswa.index', compact('nilai_mahasiswas','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nilai_bobots = NilaiBobot::all();
        $mahasiswas = Mahasiswa::all();

        return view('nilaimahasiswa.create', compact('nilai_bobots','mahasiswas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nilai = new NilaiMahasiswa([
            'mahasiswa_id' => $request->mahasiswa_id,
            'nilai_bobot_id' => $request->nilai_bobot_id,
            'sikap' => $request->sikap,
            'tugas' => $request->tugas,
            'kompetensi' => $request->kompetensi,
        ]);

        $nilaiAkhir = $nilai->hitungNilaiAkhir();

        $nilai->bobot = $nilaiAkhir;
        $nilai->nilai_akhir = $nilaiAkhir;

        $nilai->save();

        return redirect('/nilaimahasiswa')->with('success', 'Nilai akhir berhasil dihitung dan disimpan.');
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
        $nilai_bobots = NilaiBobot::all();
        $mahasiswas = Mahasiswa::all();

        return view('nilaimahasiswa.edit',  [
            'nilai_mahasiswas' => NilaiMahasiswa::find($id)
        ],  compact('nilai_bobots','mahasiswas'));
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

        $validatedData=$request->validate([
            'mahaiswa_id' => 'required',
            'nilai_bobot_id' => 'required',
            'sikap' => 'required',
            'tugas' => 'required',
            'kompetensi' => 'required'
        ]);

        NilaiMahasiswa::where('id',$id)->update($validatedData);
        return redirect('/nilaimahasiswa')->with('pesan', 'Data berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NilaiMahasiswa::destroy($id);
        return redirect('/nilaimahasiswa')->with('pesan', 'Data berhasil dihapus');
    }
    public function hitungNilaiAkhir(Request $request)
    {
        $nilai = new NilaiMahasiswa([
            'mahasiswa_id' => $request->mahasiswa_id,
            'nilai_bobot_id' => $request->nilai_bobot_id,
            'sikap' => $request->sikap,
            'tugas' => $request->tugas,
            'kompetensi' => $request->kompetensi,
        ]);

        $nilaiAkhir = $nilai->hitungNilaiAkhir();

        $nilai->bobot = $nilaiAkhir;
        $nilai->nilai_akhir = $nilaiAkhir;

        $nilai->save();

        return redirect()->back()->with('success', 'Nilai akhir berhasil dihitung dan disimpan.');
    }

    // public function search(Request $request)
    // {
    //     $keyword = $request->input('keyword');

    //     $mata_kuliahs = MataKuliah::where('kode_mk', 'like', "%$keyword%")->get();

    //     return view('matakuliah.index', compact('mata_kuliahs'));
    // }
}
