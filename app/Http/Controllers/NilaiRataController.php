<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiAkhir;
use App\Models\NilaiRata;
use App\Models\Mahasiswa;
use App\Models\Nilai;

class NilaiRataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mahasiswas = Mahasiswa::with('nilais')->get();
        // foreach ($mahasiswas as $mahasiswa) {
        //     // ...

        //     // Mengakses nilai-nilai mahasiswa dari relasi 'nilais'
        //     $nilais = $mahasiswa->nilais;
        //     $nilai_uas = 0;
        //     $nilai_tugas = 0;
        //     $nilai_kuis = 0;
        //     $nilai_uts = 0;

        //     foreach ($nilais as $nilai) {

        //         $nilai_uas += $nilai->uas ?? 0;
        //         $nilai_tugas += $nilai->tugas ?? 0;
        //         $nilai_kuis += $nilai->kuis ?? 0;
        //         $nilai_uts += $nilai->uts ?? 0;

        //         if ($nilai->tugas !== null) {
        //             $all_nilai_tugas[] = $nilai->tugas;
        //         }

        //         if ($nilai->kuis !== null) {
        //             $all_nilai_kuis[] = $nilai->kuis;
        //         }

        //         if ($nilai->uts !== null) {
        //             $all_nilai_uts[] = $nilai->uts;
        //         }

        //         if ($nilai->uas !== null) {
        //             $all_nilai_uas[] = $nilai->uas;
        //         }

        //         // ...

        //         // Anda dapat mengakses kolom lain dari tabel 'Nilai' seperti ini

        //     }

        //     // ...
        // }




        $allmahasiswas = $mahasiswas->map(function ($mahasiswa)  {

                $nilais = $mahasiswa->nilais;
                $nilai_uas = 0;
                $nilai_tugas = 0;
                $nilai_kuis = 0;
                $nilai_uts = 0;
                $all_nilai_tugas = [];
                $all_nilai_kuis = [];
                $all_nilai_uts = [];
                $all_nilai_uas = [];

                foreach ($nilais as $nilai) {
                    $nilai_uas += $nilai->uas ?? 0;
                    $nilai_tugas += $nilai->tugas ?? 0;
                    $nilai_kuis += $nilai->kuis ?? 0;
                    $nilai_uts += $nilai->uts ?? 0;

                    if ($nilai->tugas !== null) {
                        $all_nilai_tugas[] = $nilai->tugas;
                    }

                    if ($nilai->kuis !== null) {
                        $all_nilai_kuis[] = $nilai->kuis;
                    }

                    if ($nilai->uts !== null) {
                        $all_nilai_uts[] = $nilai->uts;
                    }

                    if ($nilai->uas !== null) {
                        $all_nilai_uas[] = $nilai->uas;
                    }

                    // ...
                }

                $jumlah_nilai = count($nilais); // Jumlah nilai yang ada untuk mahasiswa ini

                // Menghitung rata-rata masing-masing field
                $rata_rata_tugas = count($all_nilai_tugas) > 0 ? $nilai_tugas / count($all_nilai_tugas) : 0;
                $rata_rata_kuis = count($all_nilai_kuis) > 0 ? $nilai_kuis / count($all_nilai_kuis) : 0;
                $rata_rata_uts = count($all_nilai_uts) > 0 ? $nilai_uts / count($all_nilai_uts) : 0;
                $rata_rata_uas = count($all_nilai_uas) > 0 ? $nilai_uas / count($all_nilai_uas) : 0;
            return (object) [
                'id' => $mahasiswa->id,
                'nama'   => $mahasiswa->nama,
                'mata_kuliah_id' => $mahasiswa->mata_kuliah_id,
                'rata_rata_tugas' => $rata_rata_tugas,
                'rata_rata_kuis' => $rata_rata_kuis,
                'rata_rata_uts' => $rata_rata_uts,
                'rata_rata_uas' => $rata_rata_uas,
                'created_at' => $mahasiswa->created_at,
                'updated_at' => $mahasiswa->updated_at

                // 'title'         => $mahasiswas->title,

            ];
        });

        // dd($allmahasiswas);

        // foreach ($mahasiswas as $mahasiswa) {
        //     $nilai_uas = 0;
        //     $nilai_tugas = 0;
        //     $nilai_kuis = 0;
        //     $nilai_uts = 0;
        //     $all_nilai_tugas = [];
        //     $all_nilai_kuis = [];
        //     $all_nilai_uts = [];
        //     $all_nilai_uas = [];

        //     $nilais = $mahasiswa->nilais;

        //     foreach ($nilais as $nilai) {
        //         $nilai_uas += $nilai->uas ?? 0;
        //         $nilai_tugas += $nilai->tugas ?? 0;
        //         $nilai_kuis += $nilai->kuis ?? 0;
        //         $nilai_uts += $nilai->uts ?? 0;

        //         if ($nilai->tugas !== null) {
        //             $all_nilai_tugas[] = $nilai->tugas;
        //         }

        //         if ($nilai->kuis !== null) {
        //             $all_nilai_kuis[] = $nilai->kuis;
        //         }

        //         if ($nilai->uts !== null) {
        //             $all_nilai_uts[] = $nilai->uts;
        //         }

        //         if ($nilai->uas !== null) {
        //             $all_nilai_uas[] = $nilai->uas;
        //         }
        //     }

        //     $nilai_mahasiswa = NilaiAkhir::where('mahasiswa_id', $mahasiswa->id)->first();

        //     if ($nilai_mahasiswa === null) {
        //         NilaiAkhir::create([
        //             'mahasiswa_id' => $mahasiswa->id,
        //             // 'sikap' => null,
        //             'tugas' => count($all_nilai_tugas) > 0 ? $nilai_tugas / count($all_nilai_tugas) : null,
        //             'kuis' => count($all_nilai_kuis) > 0 ? $nilai_kuis / count($all_nilai_kuis) : null,
        //             'uts' => count($all_nilai_uts) > 0 ? $nilai_uts / count($all_nilai_uts) : null,
        //             'uas' => count($all_nilai_uas) > 0 ? $nilai_uas / count($all_nilai_uas) : null,
        //         ]);
        //     }

        //     // Do something with $mahasiswa or $nilai_mahasiswa here if needed.
        // }

        foreach ($allmahasiswas as $key => $mahasiswa) {
            $nilai_mahasiswa = NilaiRata::where('mahasiswa_id', $mahasiswa->id)->first();
            if($nilai_mahasiswa ){
                $nilai_mahasiswa->mahasiswa_id = $mahasiswa->id;
                $nilai_mahasiswa->mata_kuliah_id = $mahasiswa->mata_kuliah_id;
                $nilai_mahasiswa->tugas = $mahasiswa->rata_rata_tugas;
                $nilai_mahasiswa->kuis = $mahasiswa->rata_rata_kuis;
                $nilai_mahasiswa->uts = $mahasiswa->rata_rata_uts;
                $nilai_mahasiswa->uas = $mahasiswa->rata_rata_uas;
                $nilai_mahasiswa->save();
            }else{
                NilaiRata::create([
                    'mahasiswa_id'=> $mahasiswa->id,
                    'mata_kuliah_id'=> $mahasiswa->mata_kuliah_id,
                    'tugas'=> $mahasiswa->rata_rata_tugas,
                    'kuis'=> $mahasiswa->rata_rata_kuis,
                    'uts'=> $mahasiswa->rata_rata_uts,
                    'uas'=> $mahasiswa->rata_rata_uas,
                ]);
            }
            # code...
        }

        return view('nilairata', compact('allmahasiswas'));

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
        //
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
    public function update(Request $request,NilaiRata $nilairata, $id)
    {
        if($request->ajax()){
            $nilairata->find($request->pk)->update(['tugas'=>$request->value]);
            return response()->json(['success'=>true]);
        }
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

}
