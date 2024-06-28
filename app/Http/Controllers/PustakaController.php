<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pustaka;


class PustakaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Pustaka";
        $pustakas = Pustaka::paginate(10);
        return view('pustaka.index', compact('pustakas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pustaka.create');
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

            'utama' => 'required',
            'pendukung' => 'required'



        ]);

       Pustaka::create($validatedData);
       return redirect('/pustaka')->with('pesan', 'Data berhasil ditambahkan');
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
        return view('pustaka.edit',  [
            'pustakas' => Pustaka::find($id)
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

            'utama' => 'required',
            'pendukung' => 'required'


        ]);

        Pustaka::where('id',$id)->update($validatedData);
        return redirect('/pustaka')->with('pesan', 'Data berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pustaka::destroy($id);
        return redirect('/pustaka')->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $pustakas = Pustaka::where('kode_mk', 'like', "%$keyword%")->get();

        return view('pustaka.index', compact('pustakas'));
    }
}
