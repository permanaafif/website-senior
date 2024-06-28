<?php

use App\Http\Controllers\CplProdiController;
use App\Http\Controllers\CpMkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasMahasiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\NilaiAkhirController;
use App\Http\Controllers\NilaiBobotController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NilaiMahasiswaController;
use App\Http\Controllers\NilaiRataController;
use App\Http\Controllers\OtorisasiController;
use App\Http\Controllers\PustakaController;
use App\Http\Controllers\RpController;
use App\Http\Controllers\Rps\RpsCapaianController;
use App\Http\Controllers\Rps\RpsCetakController;
use App\Http\Controllers\Rps\RpsJudulController;
use App\Http\Controllers\Rps\RpsJurusanController;
use App\Http\Controllers\Rps\RpsKajianController;
use App\Http\Controllers\Rps\RpsKontentController;
use App\Http\Controllers\Rps\RpsProdiController;
use App\Http\Controllers\Rps\RpsSubjudulController;
use App\Http\Controllers\Rps\RpsTargetController;
use App\Http\Controllers\Rps\RpsMetodeController;
use App\Http\Controllers\SubCpmkController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });
// login/logout

Route::middleware(['guest'])->group(function () {
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
});

Route::get('/home', function () {
    return redirect('/');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('/', [DashboardController::class, 'index']);

//matakuliah
    Route::resource('/matakuliah', MataKuliahController::class)->middleware('role:admin');
    Route::get('/matakuliah/search', [MataKuliahController::class, 'search'])->name('matakuliah.search')->middleware('role:admin');

//otorisasi
    Route::resource('/otorisasi', OtorisasiController::class);
    Route::get('/otorisasi/search', [OtorisasiController::class, 'search'])->name('otorisasi.search');

//pustaka
    Route::resource('/pustaka', PustakaController::class);
    Route::get('/pustaka/search', [PustakaController::class, 'search'])->name('pustaka.search');

//teamteach
    Route::resource('/team', TeamController::class);
    Route::get('/team/search', [TeamController::class, 'search'])->name('team.search');

//cplprodi
    Route::resource('/cplprodi', CplProdiController::class);
    Route::get('/cplprodis/search', [CplProdiController::class, 'search'])->name('cplprodi.search');

//cpmk
    Route::resource('/cpmk', CpMkController::class);
    Route::get('/cpmks/search', [CpMkController::class, 'search'])->name('cpmk.search');

//subcpmk
    Route::resource('/subcpmk', SubCpmkController::class);
    Route::get('/subcpmk/search', [SubCpmkController::class, 'search'])->name('subcpmk.search');

//rp
    Route::resource('/rp', RpController::class);
    Route::get('/rp/{id}/cetak_pdf', [RpController::class, 'cetak_pdf'])->name('cetak_pdf');
    Route::get('/rp/{id}/cetakrp', [RpController::class, 'previewPDF'])->name('rp.cetakrp');

//kelas
    Route::middleware(['auth', 'can:index,kelas'])->group(function () {
        // Rute yang perlu diakses oleh pengguna dengan peran "dosen"

    });
    Route::resource('/kelas', KelasMahasiswaController::class)->middleware('role:admin,dosen');
    Route::post('/get_field_matakuliah/{id}', [KelasMahasiswaController::class,'getAllFieldMatakuliah']);
    Route::get('kelas/{id}', [KelasMahasiswaController::class, 'show'])->name('kelas.show');
    Route::get('/kelasmahasiswas/search', [KelasMahasiswaController::class, 'search'])->name('kelas.search');

//nilaimahasiswa
    Route::resource('/nilaimahasiswa', NilaiMahasiswaController::class);

//nilaitugas
    Route::resource('nilaitugas', NilaiController::class);
// Route::get('nilaitugas',  [NilaiController::class, 'indexNilaiTugas']);
    Route::get('/nilaimahasiswa/tugas', [NilaiController::class, 'indexNilaiTugas']);
    Route::get('/nilaimahasiswa/kuis', [NilaiController::class, 'indexNilaiKuis']);
    Route::get('/nilaimahasiswa/uts', [NilaiController::class, 'indexNilaiUts']);
    Route::get('/nilaimahasiswa/uas', [NilaiController::class, 'indexNilaiUas']);
    Route::post('/nilaitugas/tambah', [NilaiController::class, 'storeNilaiTugas']);
    Route::post('/nilaitugas/edit', [NilaiController::class, 'updateNilaiTugas']);
    Route::post('/nilaikuis/edit', [NilaiController::class, 'updateNilaiKuis']);
    Route::post('/nilaiuts/edit', [NilaiController::class, 'updateNilaiUts']);
    Route::post('/nilaiuas/edit', [NilaiController::class, 'updateNilaiUas']);
    Route::post('/nilaitugas/tambahkuis', [NilaiController::class, 'storeNilaiKuis']);
    Route::post('/nilaitugas/tambahuts', [NilaiController::class, 'storeNilaiUts']);
    Route::post('/nilaitugas/tambahuas', [NilaiController::class, 'storeNilaiUas']);

    Route::delete('/nilaitugas/hapustugas/{id}', [NilaiController::class, 'destroytugas']);
    Route::delete('/nilaikuis/hapuskuis/{id}', [NilaiController::class, 'destroytugas']);
    Route::delete('/nilaiuts/hapusuts/{id}', [NilaiController::class, 'destroyuts']);
    Route::delete('/nilaiuas/hapusuas/{id}', [NilaiController::class, 'destroyuas']);

// Route::post('/nilaitugas',  [NilaiController::class, 'store']);

    Route::resource('dosen', DosenController::class);
    Route::get('/dosen/search', [DosenController::class, 'search'])->name('dosen.search');

//nilairata
    Route::resource('nilairata', NilaiRataController::class);
//nilaibobot
    Route::resource('nilaibobot', NilaiBobotController::class);
    Route::post('/nilaibobot/tambahbobot', [NilaiBobotController::class, 'store']);
    Route::get('nilaibobot/{id}', [NilaiBobotController::class, 'show'])->name('nilaibobot.show');

//nilaiakhir
    Route::resource('nilaiakhir', NilaiAkhirController::class);
    Route::post('/nilaiakhir/tambahnilaiakhir', [NilaiAkhirController::class, 'store']);
    Route::post('/nilaiakhir/nilai_mahasiswa', [NilaiAkhirController::class, 'nilai_mahasiswa']);
    Route::get('/cetaknilaiakhirpreview', [NilaiAkhirController::class, 'previewPDF'])->name('cetaknilaiakhirpreview');
    Route::get('/cetaknilaiakhir', [NilaiAkhirController::class, 'cetakpdfnilaiakhir'])->name('cetaknilaiakhir');
    Route::get('/export-nilaiakhir',[NilaiAkhirController::class, 'exportnilaiakhir'])->name('exportnilaiakhir');

// Route::get('/tugas', [TugasController::class, 'index'])->name('tugas.index');
// Route::post('/tugas', [TugasController::class, 'store'])->name('tugas.store');

    Route::resource('tugas', TugasController::class);
// });

    //user

    // Route resource untuk UserController
    Route::resource('user', UserController::class);

    // Route pencarian pengguna
    Route::get('users/search', [UserController::class, 'search'])->name('user.search');

    //mahasiswa
    Route::resource('/mahasiswa', MahasiswaController::class);
    Route::get('mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
    Route::get('mahasiswakuis/{id}', [MahasiswaController::class, 'showKuis'])->name('mahasiswak.show');
    Route::get('mahasiswauts/{id}', [MahasiswaController::class, 'showUts'])->name('mahasiswauts.show');
    Route::get('mahasiswauas/{id}', [MahasiswaController::class, 'showUas'])->name('mahasiswauas.show');

    // RPS
    Route::resource('data-jurusan', RpsJurusanController::class);
    Route::resource('data-prodi', RpsProdiController::class);
    Route::resource('data-judul', RpsJudulController::class);
    Route::resource('data-subjudul', RpsSubjudulController::class);
    Route::resource('data-konten', RpsKontentController::class);
    Route::resource('data-rps', RpsCetakController::class);
    Route::resource('data-capaian', RpsCapaianController::class);
    Route::resource('data-target', RpsTargetController::class);
    Route::resource('data-kajian', RpsKajianController::class);
    Route::resource('data-metode', RpsMetodeController::class);
});
