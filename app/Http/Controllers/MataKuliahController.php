<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\MataKuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = "Mata Kuliah";
        $matakuliah = MataKuliah::all();

        // dd($matakuliah);

        return view('matakuliah.index', compact('matakuliah', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('matakuliah.create', [
            'jurusans' => Jurusan::all(),
            'prodis' => Prodi::all(),
            'dosens' => Dosen::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'kode_mk' => 'required',
            'matkul' => 'required',
            'jurusan_id' => 'required',
            'prodi_id' => 'required',
            'dosen_id' => 'required',
            'semester' => 'required',
            'sks' => 'required',
        ]);

        MataKuliah::create($validatedData);
        return redirect('/matakuliah')->with('pesan', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('matakuliah.edit', [
            'mata_kuliahs' => MataKuliah::find($id),
            'jurusans' => Jurusan::all(),
            'prodis' => Prodi::all(),
            'dosens' => Dosen::all(),
        ]);
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

        $validatedData = $request->validate([
            'kode_mk' => 'required',
            'matkul' => 'required',
            'jurusan_id' => 'required',
            'prodi_id' => 'required',
            'dosen_id' => 'required',
            'semester' => 'required',
            'sks' => 'required',
        ]);

        MataKuliah::where('id', $id)->update($validatedData);
        return redirect('/matakuliah')->with('pesan', 'Data berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MataKuliah::destroy($id);
        return redirect('/matakuliah')->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $mata_kuliahs = MataKuliah::where('kode_mk', 'like', "%$keyword%")->get();

        return view('matakuliah.index', compact('mata_kuliahs'));
    }
}
