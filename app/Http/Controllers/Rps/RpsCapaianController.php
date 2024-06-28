<?php

namespace App\Http\Controllers\Rps;

use App\Http\Controllers\Controller;
use App\Models\Capaian;
use App\Models\Dosen;
use App\Models\Judul;
use Illuminate\Http\Request;

class RpsCapaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rps.capaian.index', [
            'capaians' => Capaian::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rps.capaian.create', [
            'dosens' => Dosen::all(),
            'juduls' => Judul::all(),
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
        Capaian::create([
            'dosen_id' => $request->dosen_id,
            'judul_id' => $request->judul_id,
            'judul_capaian' => $request->judul_capaian,
            'isi_capaian' => $request->isi_capaian,
        ]);

        return redirect('/data-capaian')->with('success', 'Data berhasil di tambahkan!');
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
        return view('rps.capaian.edit', [
            'dosens' => Dosen::all(),
            'juduls' => Judul::all(),
            'capaians' => Capaian::find($id),
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
        Capaian::find($id)->update([
            'dosen_id' => $request->dosen_id,
            'judul_id' => $request->judul_id,
            'judul_capaian' => $request->judul_capaian,
            'isi_capaian' => $request->isi_capaian,
        ]);

        return redirect('/data-capaian')->with('success', 'Data berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Capaian::find($id)->delete();
        return redirect('/data-capaian')->with('success', 'Data berhasil di hapus!');
    }
}
