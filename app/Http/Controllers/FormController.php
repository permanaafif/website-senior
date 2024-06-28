<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Otorisasi;
use App\Models\Pustaka;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = session('data', ['otorisasis_id', 'pusatakas_id']);
        return view('form.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $otorisasis = Otorisasi::all();

        // Tentukan tabel yang akan digunakan dalam sesi
        $currentTable = $otorisasis->input('table');

        // Menyimpan data ke dalam sesi
        session()->push("data.$currentTable", $otorisasis);

        return redirect()->route('form.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function switch(Request $request)
    {
        $table = $request->input('table');

        // Simpan tabel yang aktif ke dalam sesi
        session()->put('active_table', $table);

        return redirect()->back();
    }

    public function submitFinal(Request $request)
    {
        $activeTable = session('active_table', 'otorisasi');

        // Ambil semua data dari sesi sesuai dengan tabel yang aktif
        $data = session("data.$activeTable", ['otorisasis', 'pusatakas']);

        // Simpan data ke dalam database (disesuaikan dengan tabel yang aktif)
        if ($activeTable == 'otorisasis') {
            foreach ($data as $item) {
                Otorisasi::create($item);
            }
        } elseif ($activeTable == 'pustakas') {
            foreach ($data as $item) {
                Pustaka::create($item);
            }
        }

        // Hapus data dari sesi setelah disimpan ke database
        session()->forget("data.$activeTable");

        return redirect()->route('form.index')->with('success', 'Data berhasil disimpan ke tabel ' . $activeTable);
    }

}
