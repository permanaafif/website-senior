<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rp;
use App\Models\MataKuliah;
use App\Models\Otorisasi;
use App\Models\CplProdi;
use App\Models\Pustaka;
use App\Models\Team;
use Barryvdh\DomPDF\Facade\Pdf;


class RpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Rp";
        $rps = Rp::paginate(10);
        return view('rp.index', compact('rps', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mata_kuliahs = MataKuliah::all();
        $otorisasis = Otorisasi::all();
        $cpl_prodis = CplProdi::all();
        $pustakas = Pustaka::all();
        $teams = Team::all();
        return view('rp.create', compact('mata_kuliahs', 'otorisasis', 'cpl_prodis', 'pustakas', 'teams'));
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

            'mata_kuliah_id' => 'required',
            'otorisasi_id' => 'required',
            'cpl_prodi_id' => 'required',
            'desc_matkul' => 'required',
            'desc_bk' => 'required',
            'pustaka_id' => 'required',
            'team_id' => 'required',
            'tgl_penyusunan' => 'required'




        ]);

       Rp::create($validatedData);
       return redirect('/rp')->with('pesan', 'Data berhasil ditambahkan');
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
        $mata_kuliahs = MataKuliah::all();
        $otorisasis = Otorisasi::all();
        $cpl_prodis = CplProdi::all();
        $pustakas = Pustaka::all();
        $teams = Team::all();
        return view('rp.edit',  [
            'rp' => Rp::find($id)
        ],  compact('mata_kuliahs', 'otorisasis', 'cpl_prodis', 'pustakas', 'teams'));
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
            'mata_kuliah_id' => 'required',
            'otorisasi_id' => 'required',
            'cpl_prodi_id' => 'required',
            'desc_matkul' => 'required',
            'desc_bk' => 'required',
            'pustaka_id' => 'required',
            'team_id' => 'required',
            'tgl_penyusunan' => 'required'
        ]);

        Rp::where('id',$id)->update($validatedData);
        return redirect('/rp')->with('pesan', 'Data berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rp::destroy($id);
        return redirect('/rp')->with('pesan', 'Data berhasil dihapus');
    }

    public function cetak_pdf(){
        $rps = Rp::all();

    	$pdf = PDF::loadview('rp.cetakrp',['rps'=>$rps] );
        return $pdf->download('laporan.pdf');
    }
    public function previewPDF($id)
{
    $rps = Rp::all();

    $pdf = PDF::loadView('rp.cetakrp', compact('rps'));

    return $pdf->stream('preview.pdf');
}
}

