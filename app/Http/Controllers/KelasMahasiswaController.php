<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasMahasiswa;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\NilaiRata;
use App\Models\MataKuliah;
use App\Models\NilaiBobot;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class KelasMahasiswaController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "kelas";
        $matakuliahs = MataKuliah::all();
        $auth_user= Auth::User();
        if($auth_user->role === 'dosen'){
        $kelasmahasiswas = Kelas::where('user_id', Auth::id())->get();
        $users = User::where('id',Auth::id())->first();
        }else{
            $kelasmahasiswas = Kelas::all();
            $users = User::all();
        }
        // dd($users);
        // dd($kelasmahasiswas);
        // if (auth()->check()) {
        //     $user = auth()->user();

        //     if ($user->role === 'dosen') {
        //         $kelasIds = Kelas::where('id_dosen', $user->id)->pluck('id');
        //         session(['kelas_ids' => $kelasIds]);
        //     }ifelse()
        // }

        return view('kelas.index', compact('kelasmahasiswas','title','matakuliahs','users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matakuliahs = MataKuliah::all();
        $kelasmahasiswas = Kelas::all();
        $users = User::all();
        return view('kelas.create', compact('matakuliahs','kelasmahasiswas','users'));
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

            'user_id' => 'required',
            'prodi' => 'required',
            'kelas' => 'required',
            'mata_kuliah_id' => 'required',
            'kodemk' => 'required',
            'kode_kelasmk' => 'required',
            'sksmk' => 'required'



        ]);

       Kelas::create($validatedData);
    //    dd($request);

       return redirect('/kelas')->with('pesan', 'Data berhasil ditambahkan');


    }

    public function getAllFieldMatakuliah(Request $request)
    {
        $data = MataKuliah::where('id', $request->id)->first();
        return response()->json($data,200);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        // dd($request, $id);
        $kelasmahasiswas = Kelas::with('mahasiswa')->find($id);
        $mahasiswas = Mahasiswa::where('kelas_id',$id)->paginate(10);
        $mahasiswas_rata = Mahasiswa::with('nilairata')->where('mata_kuliah_id',$request->input('matakuliah'))
                                                       ->where('kelas_id',$id)->get();
        $mahasiswas_bobot = Mahasiswa::with('nilaibobot')->where('mata_kuliah_id',$request->input('matakuliah') )->get();
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
                'kelas_mahasiswa_id' => $mahasiswa->id,
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



        foreach ($allmahasiswas as $key => $mahasiswa) {
            $nilai_mahasiswa = NilaiRata::where('mahasiswa_id', $mahasiswa->id)->first();
            if($nilai_mahasiswa ){
                $nilai_mahasiswa->mahasiswa_id = $mahasiswa->id;
                $nilai_mahasiswa->mata_kuliah_id = $request->input('matakuliah');
                $nilai_mahasiswa->tugas = $mahasiswa->rata_rata_tugas;
                $nilai_mahasiswa->kuis = $mahasiswa->rata_rata_kuis;
                $nilai_mahasiswa->uts = $mahasiswa->rata_rata_uts;
                $nilai_mahasiswa->uas = $mahasiswa->rata_rata_uas;
                $nilai_mahasiswa->save();
            }else{
                NilaiRata::create([
                    'mahasiswa_id'=> $mahasiswa->id,
                    'mata_kuliah_id'=> $request->input('matakuliah'),
                    'tugas'=> $mahasiswa->rata_rata_tugas,
                    'kuis'=> $mahasiswa->rata_rata_kuis,
                    'uts'=> $mahasiswa->rata_rata_uts,
                    'uas'=> $mahasiswa->rata_rata_uas,
                ]);
            }
            # code...
        }


        return view('kelas.detail', compact('kelasmahasiswas','allmahasiswas','mahasiswas','mahasiswas_rata','mahasiswas_bobot'));
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
        $kelasmahasiswas = Kelas::all();
        $users = User::all();

        return view('kelas.edit',  [
            'kelasmahasiswas' => Kelas::find($id)
        ], compact('matakuliahs','kelasmahasiswas','users'));
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
            'user_id' => 'required',
            'prodi' => 'required',
            'kelas' => 'required',
            'mata_kuliah_id' => 'required',
            'kodemk' => 'required',
            'kode_kelasmk' => 'required',
            'sksmk' => 'required'

        ]);

        Kelas::where('id',$id)->update($validatedData);
        return redirect('/kelas')->with('pesan', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::destroy($id);
        return redirect('/kelas')->with('pesan', 'Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $kelasmahasiswas = Kelas::where('kelas', 'like', "%$keyword%")->get();

        return view('kelas.index', compact('kelasmahasiswas'));
    }
}
