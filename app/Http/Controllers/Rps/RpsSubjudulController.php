<?php

namespace App\Http\Controllers\Rps;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Judul;
use App\Models\Subjudul;
use Illuminate\Http\Request;

class RpsSubjudulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rps.subjudul.index', [
            'subjuduls' => Subjudul::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rps.subjudul.create', [
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
        Subjudul::create([
            'dosen_id' => $request->dosen_id,
            'judul_id' => $request->judul_id,
            'nama_subjudul' => $request->nama_subjudul,
        ]);

        return redirect('data-subjudul')->with('success', 'Data berhasil di tambahkan!');
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
        return view('rps.subjudul.edit', [
            'dosens' => Dosen::all(),
            'juduls' => Judul::all(),
            'subjuduls' => Subjudul::find($id),
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
        Subjudul::find($id)->update([
            'dosen_id' => $request->dosen_id,
            'judul_id' => $request->judul_id,
            'nama_subjudul' => $request->nama_subjudul,
        ]);

        return redirect('data-subjudul')->with('success', 'Data berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Subjudul::find($id)->delete();

        return redirect('data-subjudul')->with('success', 'Data berhasil di hapus!');
    }
}
