<?php

namespace App\Http\Controllers\Rps;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Judul;
use App\Models\Kontent;
use App\Models\Subjudul;
use Illuminate\Http\Request;

class RpsKontentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rps.kontent.index', [
            'kontens' => Kontent::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rps.kontent.create', [
            'dosens' => Dosen::all(),
            'juduls' => Judul::all(),
            'subjuduls' => Subjudul::all(),
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
        Kontent::create([
            'dosen_id' => $request->dosen_id,
            'judul_id' => $request->judul_id,
            'subjudul_id' => $request->subjudul_id,
            'isi_konten' => $request->isi_konten,
        ]);

        return redirect('data-konten')->with('success', 'Data berhasil di tambahkan!');
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
        return view('rps.kontent.edit', [
            'dosens' => Dosen::all(),
            'juduls' => Judul::all(),
            'subjuduls' => Subjudul::all(),
            'kontens' => Kontent::find($id),
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
        Kontent::find($id)->update([
            'dosen_id' => $request->dosen_id,
            'judul_id' => $request->judul_id,
            'subjudul_id' => $request->subjudul_id,
            'isi_konten' => $request->isi_konten,
        ]);

        return redirect('data-konten')->with('success', 'Data berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kontent::find($id)->delete();

        return redirect('data-konten')->with('success', 'Data berhasil di hapus!');
    }
}
