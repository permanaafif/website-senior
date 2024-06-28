<?php

namespace App\Http\Controllers;

use App\Models\KelasMahasiswa;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Kelas;
use App\Models\MatakuliahMahasiswa;
use App\Models\Nilai;

class MahasiswaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kelas = Kelas::all();
        $matakuliah = MataKuliah::all();
        $kelas_id = $request->input('kelas_id');
        $matakuliah_id = $request->input('mata_kuliah_id');

        $mahasiswas = Mahasiswa::where('kelas_id', $kelas_id)
            ->where('mata_kuliah_id', $matakuliah_id)
            ->get();

        return view('mahasiswa.index', compact('mahasiswas','kelas','matakuliah'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas_mahasiswas = Kelas::all();
        $matakuliah = Matakuliah::all();

        return view('mahasiswa.create', compact('kelas_mahasiswas','matakuliah'));
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

            'nama' => 'required',
            'nobp' => 'required',
            'kelas_id' => 'required',
            'mata_kuliah_id'=> 'required'



        ]);

       Mahasiswa::create($validatedData);
       return redirect('/mahasiswa')->with('pesan', 'Data berhasil ditambahkan');
    }
    public function edit($id)
    {
        $kelas_mahasiswas = Kelas::all();
        $matakuliah = Matakuliah::all();
        return view('mahasiswa.edit',  [
            'mahasiswas' => Mahasiswa::find($id)
        ],compact('kelas_mahasiswas','matakuliah'));
    }
    public function update(Request $request, $id)
    {

        $validatedData=$request->validate([
            'nama' => 'required',
            'nobp' => 'required',
            'kelas_id' => 'required',
            'mata_kuliah_id'=> 'required'
        ]);

        Mahasiswa::where('id',$id)->update($validatedData);
        return redirect('/mahasiswa')->with('pesan', 'Data berhasil dihapus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $nilai = Nilai::all();

    $nilai_tugas = 0;
    $all_nilai_tugas= [];

    $mahasiswas = Mahasiswa::with('nilais')->find($id);
    $nilais = $mahasiswas->nilais;
    $nilaisCount = count($nilais);

    if ($nilaisCount > 0) {
        foreach ($nilais as $key => $nilai) {

            if ($nilai->tugas != 0) {
                $all_nilai_tugas[$key] = $nilai;
                $nilai_tugas += $nilai->tugas;
            }

        }

        if (count($all_nilai_tugas) > 0){
            $nilai_tugas = $nilai_tugas / count($all_nilai_tugas);

            $rata_rata = [

                'tugas' => $nilai_tugas,

            ];
        }else{
            $rata_rata = [

                'tugas' => 0,

            ];
        }
    } else {
        // Handle the case where there are no nilais.
        $rata_rata = [

            'tugas' => 0,

        ];
    }
    // dd($all_nilai_tugas);
    return view('mahasiswa.detail', compact('all_nilai_tugas', 'rata_rata','id'));
}
public function showKuis($id)
{
    $nilai = Nilai::all();

    $nilai_kuis = 0;
    $all_nilai_kuis= [];

    $mahasiswas = Mahasiswa::with('nilais')->find($id);
    $nilais = $mahasiswas->nilais;
    $nilaisCount = count($nilais);

    if ($nilaisCount > 0) {
        foreach ($nilais as $key => $nilai) {

            if ($nilai->kuis != 0) {
                $all_nilai_kuis[$key] = $nilai;
                $nilai_kuis += $nilai->kuis;
            }

        }

        if (count($all_nilai_kuis) > 0){
            $nilai_kuis = $nilai_kuis / count($all_nilai_kuis);

            $rata_rata = [

                'kuis' => $nilai_kuis,

            ];
        }else{
            $rata_rata = [

                'kuis' => 0,

            ];
        }
    } else {
        // Handle the case where there are no nilais.
        $rata_rata = [

            'kuis' => 0,

        ];
    }
    // dd($all_nilai_kuis);
    return view('mahasiswa.detailk', compact('all_nilai_kuis', 'rata_rata','id'));
}
public function showUts($id)
{
    $nilai = Nilai::all();

    $nilai_uts = 0;
    $all_nilai_uts= [];

    $mahasiswas = Mahasiswa::with('nilais')->find($id);
    $nilais = $mahasiswas->nilais;
    $nilaisCount = count($nilais);

    if ($nilaisCount > 0) {
        foreach ($nilais as $key => $nilai) {

            if ($nilai->uts != 0) {
                $all_nilai_uts[$key] = $nilai;
                $nilai_uts += $nilai->uts;
            }

        }

        if(count($all_nilai_uts) > 0){
            $nilai_uts = $nilai_uts / count($all_nilai_uts);

            $rata_rata = [

                'uts' => $nilai_uts,

            ];
        }else{
            $rata_rata = [

                'uts' => 0,

            ];
        }
    } else {
        // Handle the case where there are no nilais.
        $rata_rata = [

            'uts' => 0,

        ];
    }
    // dd($all_nilai_kuis);
    return view('mahasiswa.detailuts', compact('all_nilai_uts', 'rata_rata','id'));
}
public function showUas($id)
{
    $nilai = Nilai::all();

    $nilai_uas = 0;
    $all_nilai_uas= [];

    $mahasiswas = Mahasiswa::with('nilais')->find($id);
    $nilais = $mahasiswas->nilais;
    $nilaisCount = count($nilais);

    if ($nilaisCount > 0) {
        foreach ($nilais as $key => $nilai) {

            if ($nilai->uas != 0) {
                $all_nilai_uas[$key] = $nilai;
                $nilai_uas += $nilai->uas;
            }

        }

        if(count($all_nilai_uas) > 0){
            $nilai_uas = $nilai_uas /count($all_nilai_uas);

            $rata_rata = [

                'uas' => $nilai_uas,

            ];
        }else{
            $rata_rata = [

                'uas' => 0,

            ];
        }
    } else {
        // Handle the case where there are no nilais.
        $rata_rata = [

            'uas' => 0,

        ];
    }
    // dd($all_nilai_kuis);
    return view('mahasiswa.detailuas', compact('all_nilai_uas', 'rata_rata','id'));
}
public function destroy($id)
{
    Mahasiswa::destroy($id);
    return redirect('/mahasiswa')->with('pesan', 'Data berhasil dihapus');
}
}
