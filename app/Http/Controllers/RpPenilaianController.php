<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RpPenilaian;

class RpPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "rp";
        $rp_penilaians = RpPenilaian::paginate(10);
        return view('rppenilaian.index', compact('rp_penilaians', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rppenilaian.create');
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

            'teknik' => 'required',
            'indikator' => 'required',
            'bobot' => 'required'



        ]);

       RpPenilaian::create($validatedData);
       return redirect('/rppenilaian')->with('pesan', 'Data berhasil ditambahkan');
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
        return view('rppenilaian.edit',  [
            'rp_penilaians' => RpPenilaian::find($id)
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
            'teknik' => 'required',
            'indikator' => 'required',
            'bobot' => 'required'


        ]);

        RpPenilaian::where('id',$id)->update($validatedData);
        return redirect('/rppenilaian')->with('pesan', 'Data berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RpPenilaian::destroy($id);
        return redirect('/rppenilaian')->with('pesan', 'Data berhasil dihapus');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $rp_penilaians = RpPenilaian::where('teknik', 'like', "%$keyword%")->get();

        return view('rppenilaian.index', compact('rp_penilaians'));
    }
}
