<?php

namespace App\Http\Controllers\Rps;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Metode;
use App\Models\Target;
use Illuminate\Http\Request;

class RpsMetodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rps.metode.index', [
            'metodes' => Metode::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rps.metode.create', [
            'dosens' => Dosen::all(),
            'targets' => Target::all(),
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
        Metode::create([
            'dosen_id' => $request->dosen_id,
            'target_id' => $request->target_id,
            'bentuk_metode' => $request->bentuk_metode,
            'kondisi_metode' => $request->kondisi_metode,
            'pengalaman_metode' => $request->pengalaman_metode,
        ]);

        return redirect('/data-metode')->with('success', 'Data berhasil di tambahkan!');
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
        return view('rps.metode.edit', [
            'dosens' => Dosen::all(),
            'targets' => Target::all(),
            'metodes' => Metode::find($id),
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
        Metode::find($id)->update([
            'dosen_id' => $request->dosen_id,
            'target_id' => $request->target_id,
            'bentuk_metode' => $request->bentuk_metode,
            'kondisi_metode' => $request->kondisi_metode,
            'pengalaman_metode' => $request->pengalaman_metode,
        ]);

        return redirect('/data-metode')->with('success', 'Data berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Metode::find($id)->delete();

        return redirect('/data-metode')->with('success', 'Data berhasil di hapus!');
    }
}
