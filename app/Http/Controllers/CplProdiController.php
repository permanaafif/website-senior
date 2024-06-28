<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CplProdi;


class CplProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cpl_prodis = CplProdi::paginate(10);
        $title = "cplprodi";
        return view('cplprodi.index', compact('cpl_prodis', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('cplprodi.create');
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

            'judul' => 'required',
            'isijudul' => 'required'



        ]);

       CplProdi::create($validatedData);
       return redirect('/cplprodi')->with('pesan', 'Data berhasil ditambahkan');
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

        return view('cplprodi.edit',  [
            'cpl_prodis' => CplProdi::find($id)
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

        $validatedData=$request->validate([
            'judul' => 'required',
            'isijudul' => 'required'
        ]);

        CplProdi::where('id',$id)->update($validatedData);
        return redirect('/cplprodi')->with('pesan', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CplProdi::destroy($id);
        return redirect('/cplprodi')->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        // dd(route('cplprodi.search'));
        $request->validate([
            'keyword' => 'required', // Menentukan aturan validasi yang sesuai
        ]);
        $keyword = $request->input('keyword');


        $cpl_prodis = CplProdi::where('judul', 'like', "%$keyword%")->get();
        // dd($cpl_prodi );


        return view('cplprodi.index', compact('cpl_prodis'));
    }
}
