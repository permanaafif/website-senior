<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Kelas;
use App\Models\NilaiAkhir;
use App\Models\NilaiRata;
use Illuminate\Http\Request;
use App\Models\NilaiBobot;

class NilaiBobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $matakuliah = MataKuliah::all();
    $matakuliah_id = $request->query('mata_kuliah_id');
        $nilaibobot = NilaiBobot::where('mata_kuliah_id',$matakuliah_id)->get();
    // dd($nilaibobot);
    return view('nilaibobot.index',compact('nilaibobot','matakuliah'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matakuliahs = MataKuliah::all();
        return view('nilaibobot.create', compact('matakuliahs'));
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
            'mata_kuliah_id' => 'required',
            'bobot_tugas' => 'required|numeric|min:0',
            'bobot_kuis' => 'required|numeric|min:0',
            'bobot_uts' => 'required|numeric|min:0',
            'bobot_uas' => 'required|numeric|min:0',
        ]);

        // Menghitung total bobot yang diinputkan oleh pengguna
        $totalBobot = $validatedData['bobot_tugas'] + $validatedData['bobot_kuis'] +
                      $validatedData['bobot_uts'] + $validatedData['bobot_uas'];

        // Memastikan total bobot sama dengan 100%
        if ($totalBobot != 100) {
            return redirect('/nilairata')->with('error', 'Total bobot harus sama dengan 100%');
        }



        // Mengambil nilai dari tabel Nilai
        $nilai = NilaiRata::all(); // Ganti dengan cara yang sesuai untuk mengambil nilai dari tabel
        $mahasiswas = Mahasiswa::with('nilais')->get();

        $all_nilai_finish = $mahasiswas->map(function($mahasiswa) use ($validatedData) {
            $nilai_mahasiswa = NilaiRata::where('mahasiswa_id', $mahasiswa->id)->first();

            $nilaiRata = ($validatedData['bobot_tugas'] / 100) * $nilai_mahasiswa->tugas +
                      ($validatedData['bobot_kuis'] / 100) * $nilai_mahasiswa->kuis +
                      ($validatedData['bobot_uts'] / 100) * $nilai_mahasiswa->uts +
                      ($validatedData['bobot_uas'] / 100) * $nilai_mahasiswa->uas;

            $mahasiswa['nilai_akhir'] = $nilaiRata;
            return $mahasiswa;
        });

        // dd($all_nilai_finish);
        // Simpan data jika total bobot sesuai

        foreach ($all_nilai_finish as $key => $mahasiswa) {
            $bobot_mahasiswa = NilaiBobot::where('mahasiswa_id', $mahasiswa->id)->first();
                // Menghitung nilai akhir
                $nilaiRata = $mahasiswa->nilai_akhir;

                // Menentukan nilai berdasarkan rata-rata
                if ($nilaiRata >= 85) {
                    $nilaiHuruf = 'A';
                } elseif ($nilaiRata >= 80 && $nilaiRata <= 84) {
                    $nilaiHuruf = 'A-';
                } elseif ($nilaiRata >= 75 && $nilaiRata <= 79) {
                    $nilaiHuruf = 'B+';
                } elseif ($nilaiRata >= 70 && $nilaiRata <= 74) {
                    $nilaiHuruf = 'B';
                } elseif ($nilaiRata >= 65 && $nilaiRata <= 69) {
                    $nilaiHuruf = 'B-';
                } elseif ($nilaiRata >= 60 && $nilaiRata <= 64) {
                    $nilaiHuruf = 'C+';
                } elseif ($nilaiRata >= 55 && $nilaiRata <= 59) {
                    $nilaiHuruf = 'C';
                } elseif ($nilaiRata >= 50 && $nilaiRata <= 54) {
                    $nilaiHuruf = 'C-';
                } elseif ($nilaiRata >= 40 && $nilaiRata <= 49) {
                    $nilaiHuruf = 'D';
                } else {
                    $nilaiHuruf = 'E';
                }

            if($bobot_mahasiswa != null && $bobot_mahasiswa->mata_kuliah_id == $validatedData['mata_kuliah_id']){
                $bobot_mahasiswa->mata_kuliah_id = $validatedData['mata_kuliah_id'];
                $bobot_mahasiswa->bobot_tugas = $validatedData['bobot_tugas'];
                $bobot_mahasiswa->bobot_kuis = $validatedData['bobot_kuis'];
                $bobot_mahasiswa->bobot_uts = $validatedData['bobot_uts'];
                $bobot_mahasiswa->bobot_uas = $validatedData['bobot_uas'];
                $bobot_mahasiswa->nilai_akhir = $mahasiswa->nilai_akhir;
                $bobot_mahasiswa->grade = $nilaiHuruf;
                $bobot_mahasiswa->save();
            }else{
                NilaiBobot::create([
                    'mahasiswa_id' => $mahasiswa->id,
                    'mata_kuliah_id' => $validatedData['mata_kuliah_id'],
                    'bobot_tugas' => $validatedData['bobot_tugas'],
                    'bobot_kuis' => $validatedData['bobot_kuis'],
                    'bobot_uts' => $validatedData['bobot_uts'],
                    'bobot_uas' => $validatedData['bobot_uas'],
                    'nilai_akhir' =>$mahasiswa->nilai_akhir,
                    'grade' => $nilaiHuruf,
                ]);
            }
        }
        $nilaibobot = NilaiBobot::all();

        // try {
        //     NilaiBobot::create([
        //         'mahasiswa_id' => 1,
        //         'nilai_akhir_id' => 2,
        //         'bobot_tugas' => 3,
        //         'bobot_kuis' => 4,
        //         'bobot_uts' => 5,
        //         'bobot_uas' => 6,
        //         'nilai_akhir' => null,
        //     ]);
        // } catch (\Throwable $th) {
        //     dd($th);
        // }

        return redirect('/nilaibobot')->with('pesan', 'Data berhasil ditambahkan')->with('nilaibobot', $nilaibobot);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $nilaibobot = NilaiBobot::with('mahasiswa')->get();

    // $mahasiswas = Mahasiswa::where('kelas_id',$id)->paginate(10);
    // dd($nilaibobot);
    return view('nilaibobot.detail', compact('nilaibobot'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matakuliahs = MataKuliah::all();
        return view('nilaibobot.edit',  [
            'nilai_bobots' => NilaiBobot::find($id)
        ], compact('matakuliahs'));
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
            'bobot_tugas' => 'required',
            'bobot_kuis' =>'required',
            'bobot_uts' =>'required',
            'bobot_uas' =>'required'
        ]);

        NilaiBobot::where('id',$id)->update($validatedData);
        return redirect('/nilaibobot')->with('pesan', 'Data berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NilaiBobot::destroy($id);
        return redirect('/nilaibobot')->with('pesan', 'Data berhasil dihapus');
    }
}
