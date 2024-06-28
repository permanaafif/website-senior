<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CpMk;
use App\Models\CplProdi;

class CpMkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "cpmk";
        $cp_mks = CpMk::paginate(15);
        return view('cpmk.index', compact('cp_mks', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cpl_prodis = CplProdi::all();
        return view('cpmk.create', compact('cpl_prodis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData= $request->validate([

            'cpl_prodi_id' => 'required',
            'judul' => 'required',
            'isijudul' =>'required'



        ]);

       CpMk::create($validatedData);
       return redirect('/cpmk')->with('pesan', 'Data berhasil ditambahkan');
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
        $cpl_prodis = CplProdi::all();
        return view('cpmk.edit',  [
            'cp_mks' => cpmk::find($id)
        ], compact('cpl_prodis'));
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

        $validatedData=$request->validate([
            'cpl_prodi_id' => 'required',
            'judul' => 'required',
            'isijudul' =>'required'
        ]);

        CpMk::where('id',$id)->update($validatedData);
        return redirect('/cpmk')->with('pesan', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CpMk::destroy($id);
        return redirect('/cpmk')->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $cp_mks = CpMk::where('judul', 'like', "%$keyword%")->get();

        return view('cpmk.index', compact('cp_mks'));
    }
}
