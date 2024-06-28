<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\MataKuliah;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliah = MataKuliah::all();
        $users = User::paginate(10);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $matakuliahs= MataKuliah::all();
        return view('user.create',compact('roles','matakuliahs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'nip' => 'required',
            'password' => 'required',
            'role' => 'required',
            'email' => 'required',
        ]);


        if ($validator->fails()){
            return redirect('/user/create')->withErrors($validator)->withInput();
        }
        $user = $validator->valid();

        $user = new User();
        $user->nip = $request->nip;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->email = $request->email;

        $user->save();
        // dd($request->all());

        return redirect('/user')->with('pesan','Data berhasil dimasukkan');

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
        $roles = Role::all();
        return view('user.edit', [
            'users' => User::find($id)
        ], compact('roles'));
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
            'nama' => 'required',
            'nip' => 'required',
            'email' => 'required|email|unique:users,email,' . $id, // Tambahkan aturan unik yang mengabaikan pengguna dengan ID saat ini
            'role'=>'required',
            'password' => 'required',

        ]);

        User::where('id',$id)->update($validatedData);
        return redirect('/user')->with('pesan', 'Data berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/user')->with('pesan', 'Data berhasil dihapus');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $users = User::where('nama', 'like', "%$keyword%")->get();

        return view('user.index', compact('users'));
    }
}
