<?php

namespace App\Http\Controllers\Rps;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Target;
use Illuminate\Http\Request;

class RpsTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rps.target.index', [
            'targets' => Target::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rps.target.create', [
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
        Target::create([
            'dosen_id' => $request->dosen_id,
            'kemampuan' => $request->kemampuan,
            'minggu' => $request->minggu,
            'waktu' => $request->waktu,
            'teknik' => $request->teknik,
            'indikator' => $request->indikator,
            'bobot' => $request->bobot,
        ]);

        return redirect('/data-target')->with('success', 'Data berhasil di tambahkan!');
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
        return view('rps.target.edit', [
            'dosens' => Dosen::all(),
            'targets' => Target::find($id),
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
        Target::find($id)->update([
            'dosen_id' => $request->dosen_id,
            'kemampuan' => $request->kemampuan,
            'minggu' => $request->minggu,
            'waktu' => $request->waktu,
            'teknik' => $request->teknik,
            'indikator' => $request->indikator,
            'bobot' => $request->bobot,
        ]);

        return redirect('/data-target')->with('success', 'Data berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Target::find($id)->delete();

        return redirect('/data-target')->with('success', 'Data berhasil di hapus!');
    }
}
