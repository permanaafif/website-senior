<?php

namespace App\Http\Controllers\Rps;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Kajian;
use App\Models\Target;
use Illuminate\Http\Request;

class RpsKajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rps.kajian.index', [
            'kajians' => Kajian::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rps.kajian.create', [
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
        Kajian::create([
            'dosen_id' => $request->dosen_id,
            'target_id' => $request->target_id,
            'isi_kajian' => $request->isi_kajian,
        ]);

        return redirect('/data-kajian')->with('success', 'Data berhasil di tambahkan!');
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
        return view('rps.kajian.edit', [
            'dosens' => Dosen::all(),
            'targets' => Target::all(),
            'kajians' => Kajian::find($id),
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
        Kajian::find($id)->update([
            'dosen_id' => $request->dosen_id,
            'target_id' => $request->target_id,
            'isi_kajian' => $request->isi_kajian,
        ]);

        return redirect('/data-kajian')->with('success', 'Data berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kajian::find($id)->delete();

        return redirect('/data-kajian')->with('success', 'Data berhasil di hapus!');
    }
}
