<?php

namespace App\Http\Controllers\Rps;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class RpsJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rps.jurusan.index', [
            'jurusans' => Jurusan::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rps.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'nama_kajur' => $request->nama_kajur,
        ]);

        return redirect('data-jurusan')->with('success', 'Data berhasil di tambahkan!');
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
        return view('rps.jurusan.edit', [
            'jurusans' => Jurusan::find($id),
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
        Jurusan::where('id', $id)->update([
            'nama_jurusan' => $request->nama_jurusan,
            'nama_kajur' => $request->nama_kajur,
        ]);

        return redirect('data-jurusan')->with('success', 'Data berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Jurusan::find($id)->delete();

        return redirect('data-jurusan')->with('success', 'Data berhasil di hapus!');
    }
}
