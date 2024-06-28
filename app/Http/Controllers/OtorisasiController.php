<?php

namespace App\Http\Controllers;

use App\Models\Otorisasi;
use App\Models\Pustaka;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OtorisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = session('data', []);

         $title = "Otorisasi";
         $otorisasis = Otorisasi::all();

        //  dd($otorisasis);
        // return view('otorisasi.index', compact('otorisasis','title', 'data'));
        return view('otorisasi.index', compact('otorisasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('otorisasi.create');
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

            'user_id' => '',
            'pe_rps' => 'required',
            'koprodi' => 'required',
            'kajur' =>'required'



        ]);
        Otorisasi::create($validatedData);


    //    Otorisasi::create()->session()->push("data.$validatedData");

       return redirect('/otorisasi');
    }
    public function switchTable(Request $request)
    {
        $validatedData= $request->validate([

            'utama' => 'required',
            'pendukung' => 'required'



        ]);

        Pustaka::create()->session()->push("data.$validatedData");

        return redirect('/pustaka')->back();
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
        return view('otorisasi.edit',  [
            'otorisasis' => Otorisasi::find($id)
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
            'pe_rps' => 'required',
            'koprodi' => 'required',
            'kajur' =>'required'

        ]);

        Otorisasi::where('id',$id)->update($validatedData);
        return redirect('/otorisasi')->with('pesan', 'Data berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Otorisasi::destroy($id);
        return redirect('/otorisasi')->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $otorisasis = Otorisasi::where('pe_rps', 'like', "%$keyword%")->get();

        return view('otorisasi.index', compact('otorisasis'));
    }
}
