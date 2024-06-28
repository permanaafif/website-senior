<?php

namespace App\Http\Controllers\Rps;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;

class RpsProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rps.prodi.index', [
            'prodis' => Prodi::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rps.prodi.create', [
            'jurusans' => Jurusan::all(),
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
        Prodi::create([
            'jurusan_id' => $request->jurusan_id,
            'nama_prodi' => $request->nama_prodi,
            'nama_kaprodi' => $request->nama_kaprodi,
        ]);

        return redirect('data-prodi')->with('success', 'Data berhasil di tambahkan!');
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
        return view('rps.prodi.edit', [
            'jurusans' => Jurusan::all(),
            'prodis' => Prodi::find($id),
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
        Prodi::where('id', $id)->update([
            'jurusan_id' => $request->jurusan_id,
            'nama_prodi' => $request->nama_prodi,
            'nama_kaprodi' => $request->nama_kaprodi,
        ]);

        return redirect('data-prodi')->with('success', 'Data berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prodi::find($id)->delete();

        return redirect('data-prodi')->with('success', 'Data berhasil di hapus!');
    }
}
