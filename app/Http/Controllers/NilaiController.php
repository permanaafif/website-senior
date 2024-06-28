<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;

class NilaiController extends Controller
{
    public function indexNilaiTugas()
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliah = MataKuliah::all();
        $nilais = Nilai::paginate(10);


        return view('mahasiswa.detail', compact('nilais','mahasiswas','matakuliah'));
    }

    public function indexNilaiKuis()
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliah = MataKuliah::all();
        $nilais = Nilai::paginate(10);
        return view('mahasiswa.detailk', compact('nilais','mahasiswas','matakuliah'));
    }
    public function indexNilaiUts()
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliah = MataKuliah::all();
        $nilais = Nilai::paginate(10);
        return view('mahasiswa.detailuts', compact('nilais','mahasiswas','matakuliah'));
    }
    public function indexNilaiUas()
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliah = MataKuliah::all();
        $nilais = Nilai::paginate(10);
        return view('mahasiswa.detailuas', compact('nilais','mahasiswas','matakuliah'));
    }

    // public function createNilaiTugas()
    // {
    //     return view('nilaitugas.create');
    // }
    // public function createNilaiKuis()
    // {
    //     return view('nilaitugas.create');
    // }



    public function storeNilaiTugas(Request $request)
    {
        $validatedData= $request->validate([
            'mahasiswa_id' => 'required',
            'mata_kuliah_id' => 'required',
            'tugas' => 'required'
        ]);


       Nilai::create($validatedData);

       return redirect('/nilaimahasiswa/tugas')->with('pesan', 'Data berhasil ditambahkan');
        // $request->validate([
        //     'mahasiswa_id' => 'required',
        //     'tugas' => '',
        //     'kuis' => '',
        //     'uts' => '',
        //     'uas' => '',

        // ]);

        // Nilai::create([
        //     'mahasiswa_id' => $request->mahasiswa_id,
        //     'tugas' => $request->tugas,
        //     'kuis' => $request->kuis,
        //     'uts' => $request->uts,
        //     'uas' => $request->uas,
        // ]);

        // return redirect()->route('mahasiswa.show',$request->mahasiswa_id)->with('success', 'Nilai  berhasil ditambahkan.');

    }
    public function storeNilaiKuis(Request $request)
    {
        $validatedData= $request->validate([
            'mahasiswa_id' => 'required',
            'mata_kuliah_id' => 'required',
            'kuis' => 'required',
        ]);


       Nilai::create($validatedData);

       return redirect('/nilaimahasiswa/kuis')->with('pesan', 'Data berhasil ditambahkan');


    }
    public function storeNilaiUts(Request $request)
    {
        $validatedData= $request->validate([
            'mahasiswa_id' => 'required',
            'mata_kuliah_id' => 'required',
            'uts' => 'required',
        ]);


       Nilai::create($validatedData);

       return redirect('/nilaimahasiswa/uts')->with('pesan', 'Data berhasil ditambahkan');


    }
    public function storeNilaiUas(Request $request)
    {
        $validatedData= $request->validate([
            'mahasiswa_id' => 'required',
            'mata_kuliah_id' => 'required',
            'uas' => 'required',
        ]);


       Nilai::create($validatedData);

       return redirect('/nilaimahasiswa/uas')->with('pesan', 'Data berhasil ditambahkan');


    }
    public function edit($id)
    {

        // $mahasiswas = Mahasiswa::all();

        // return view('nilai.edit',  [
        //     'nilai' => Nilai::find($id)
        // ],  compact('mahasiswas'));
    }
    public function updateNilaiTugas(Request $request, Nilai $nilai, $id=null)
   {
        // $request->validate([
        //     'mahasiswa_id' => 'required',
        //     'tugas' => '',
        //     'kuis' => '',
        //     'uts' => '',
        //     'uas' => '',

        // ]);

        // Nilai::update([
        //     'mahasiswa_id' => $request->mahasiswa_id,
        //     'tugas' => $request->tugas,
        //     'kuis' => $request->kuis,
        //     'uts' => $request->uts,
        //     'uas' => $request->uas,
        // ]);
        // $nilai_update = Nilai::where('mahasiswa_id', $request->mahasiswa_id)->first();
        // $nilai_update->tugas = $request->tugas;
        // $nilai_update->kuis = $request->kuis;
        // $nilai_update->uts = $request->uts;
        // $nilai_update->uas = $request->uas;


        // $nilai_update->save();
        if($request->ajax()){
            $nilai->find($request->pk)->update(['tugas'=>$request->value]);
            return response()->json(['success'=>true]);


        }

        // return redirect()->route('mahasiswa.show',$request->mahasiswa_id)->with('success', 'Nilai  berhasil ditambahkan.');

    }
    public function updateNilaiKuis(Request $request, Nilai $nilai, $id=null)
   {

        if($request->ajax()){
            $nilai->find($request->pk)->update(['kuis'=>$request->value]);
            return response()->json(['success'=>true]);


        }


    }
    public function updateNilaiUts(Request $request, Nilai $nilai, $id=null)
   {

        if($request->ajax()){
            $nilai->find($request->pk)->update(['uts'=>$request->value]);
            return response()->json(['success'=>true]);


        }


    }
    public function updateNilaiUass(Request $request, Nilai $nilai, $id=null)
   {

        if($request->ajax()){
            $nilai->find($request->pk)->update(['uas'=>$request->value]);
            return response()->json(['success'=>true]);


        }


    }
    public function destroytugas(Request $request, $id)
    {
        Nilai::destroy($id);
        // return redirect('/mahasiswa')->with('success', 'Nilai  berhasil ditambahkan.');
        return back()->with('success', 'Nilai  berhasil dihapus.');
    }
    public function destroykuis(Request $request, $id)
    {
        Nilai::destroy($id);
        // return redirect('/mahasiswa')->with('success', 'Nilai  berhasil ditambahkan.');
        return back()->with('success', 'Nilai  berhasil dihapus.');
    }
    public function destroyuts(Request $request, $id)
    {
        Nilai::destroy($id);
        // return redirect('/mahasiswa')->with('success', 'Nilai  berhasil ditambahkan.');
        return back()->with('success', 'Nilai  berhasil dihapus.');
    }
    public function destroyuas(Request $request, $id)
    {
        Nilai::destroy($id);
        // return redirect('/mahasiswa')->with('success', 'Nilai  berhasil ditambahkan.');
        return back()->with('success', 'Nilai  berhasil dihapus.');
    }

}
