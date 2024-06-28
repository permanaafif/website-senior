<?php

namespace App\Http\Controllers\Rps;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Judul;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class RpsJudulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rps.judul.index', [
            'juduls' => Judul::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rps.judul.create', [
            'dosens' => Dosen::all(),
            'matakuliahs' => MataKuliah::all()
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
        Judul::create([
            'dosen_id' => $request->dosen_id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'nama_judul' => $request->nama_judul,
        ]);

        return redirect('data-judul')->with('success', 'Data berhasil di tambahkan!');
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
        return view('rps.judul.edit', [
            'juduls' => Judul::find($id),
            'matakuliahs' => MataKuliah::all(),
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
        Judul::where('id', $id)->update([
            'dosen_id' => $request->dosen_id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'nama_judul' => $request->nama_judul,
        ]);

        return redirect('data-judul')->with('success', 'Data berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Judul::find($id)->delete();

        return redirect('data-judul')->with('success', 'Data berhasil di edit!');
    }
}
