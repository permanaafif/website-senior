<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login', [

        ]);
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
    public function authenticate(Request $request)
     {

        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'password' => 'required',
        ], [
            'nip.required' => 'nip harus diisi.',
            'password.required' => 'Kata Sandi Salah',
        ]);

        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

        $infologin = [
            'nip' => $request->nip,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            $user = Auth::user();
                if ($user->role == 'admin') {
                    return redirect('/');
                } elseif ($user->role == 'dosen') {
                    return redirect('/kelas');
                }elseif ($user->role == 'kaprodi') {
                    return redirect('/rp');
                }
            } else {
                Auth::logout();
                session()->flash('loginError', 'nip atau password yang dimasukkan salah');
    return redirect('/login');

            }
    }
//     protected function authenticated(Request $request, $user)
// {
//     if ($user->levels->pluck('dosen')->contains('admin')) {
//         return redirect()->intended('/admin/dashboard');
//     } else {
//         return redirect()->intended('/user/dashboard');
//     }
// }

    public function logout(Request $request)
    {
        // $request->session()->invalidate();

        // $request->session()->regenerateToken();
        Auth::logout();

        return redirect('/login');

    }
}
