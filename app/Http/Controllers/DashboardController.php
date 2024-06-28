<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MataKuliah;
use App\Models\KelasMahasiswa;
use App\Models\Kelas;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "dashboard";
        $users = User::all();
        $matakuliah = MataKuliah::all();
        $kelasmahasiswa = Kelas::all();
        $mahasiswa = Mahasiswa::all();
        $totalUsers = $users->count();
        $totalmatakuliah = $matakuliah->count();
        $totalkelasmahasiswa = $kelasmahasiswa->count();
        $totalmahasiswa = $mahasiswa->count();
        return view('dashboard.index', compact('users','totalUsers','totalmatakuliah','totalkelasmahasiswa','totalmahasiswa','kelasmahasiswa'));
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

    public function getTotal()
    {

    }

    public function count_item()
    {

    }
}
