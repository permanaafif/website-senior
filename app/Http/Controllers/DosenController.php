<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = Dosen::paginate(10);
        $title = "dosen";
        return view('dosen.index', compact('dosens', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dosen.create', [
            'jurusans' => Jurusan::all(),
            'prodis' => Prodi::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'jurusan_id' => 'required',
            'prodi_id' => 'required',
            'user_id' => 'required',
            'nip' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required',

        ]);

        Dosen::create($validatedData);
        return redirect('/dosen')->with('pesan', 'Data berhasil ditambahkan');
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

        return view('dosen.edit', [
            'dosens' => Dosen::find($id),
            'jurusans' => Jurusan::all(),
            'prodis' => Prodi::all(),
            'users' => User::all(),
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
        $validatedData = $request->validate([

            'jurusan_id' => 'required',
            'prodi_id' => 'required',
            'user_id' => 'required',
            'nip' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required',
        ]);

        Dosen::where('id', $id)->update($validatedData);
        return redirect('/dosen')->with('pesan', 'Data berhasil diupdate');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dosen::destroy($id);
        return redirect('/dosen')->with('pesan', 'Data berhasil dihapus');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $dosens = Dosen::where('nama', 'like', "%$keyword%")->get();

        return view('dosen.index', compact('dosens'));
    }
}
