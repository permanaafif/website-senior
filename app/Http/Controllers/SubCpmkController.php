<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CpMk;
use App\Models\SubCpmk;

class SubCpmkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "SubCpmk";
        $sub_cpmks = SubCpmk::paginate(15);
        return view('subcpmk.index', compact('sub_subcpmks', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cp_mks = CpMk::all();
        return view('subcpmk.create', compact('cp_mks'));
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

            'cp_mk_id' => 'required',
            'deskripsi' => 'required',




        ]);

       SubCpmk::create($validatedData);
       return redirect('/subcpmk')->with('pesan', 'Data berhasil ditambahkan');
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
        $cp_mks = CpMk::all();
        return view('subcpmk.edit',  [
            'sub_cpmks' => SubCpmk::find($id)
        ], compact('cp_mks'));
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
            'cp_mk_id' => 'required',
            'deskripsi' => 'required',

        ]);

        SubCpmk::where('id',$id)->update($validatedData);
        return redirect('/SubCpmk')->with('pesan', 'Data berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCpmk::destroy($id);
        return redirect('/SubCpmk')->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $sub_cpmks = SubCpmk::where('kode_mk', 'like', "%$keyword%")->get();

        return view('subcpmk.index', compact('sub_cpmks'));
    }
}
