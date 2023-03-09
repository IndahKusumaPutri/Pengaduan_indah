<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;

class AuthController extends Controller
{
    public function getlogin()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('dashboard');
        } elseif ($request['email'] == null && $request['email'] == null) {
            return redirect('login')->with('error', 'Data tidak boleh kosong !!');
        } elseif (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->back();
        } else {
            return redirect()->route('login')->with('error', 'Email atau password anda salah !!');
        }

        // if ($request['email'] == null && $request['email'] == null) {
        //     return redirect('login')->with('error','Data tidak boleh kosong !!');
        // } elseif (Auth::attempt($request->only('email','password'))) {
        //     return redirect()->back();
        // } else {
        //     return redirect()->route('login')->with('error','Email atau password anda salah !!');
        // } 

        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        //     return redirect()->back();
        // }
        // return redirect()->route('login')->with('error','Email atau Password anda salah !!');
    }

    public function getregister()
    {
        return view('auth.register');
    }

    public function postregister(Request $request)
    {
        $this->validate($request, [
            'nik'       => 'required|min:16',
            'name'      => 'required|min:5',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'nik'       => $request->nik,
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        // if($request->hasFile('foto')) {
        //     $request->file('foto')->move('img/', $request->file('foto')->getClientOriginalName());
        //     $user->foto = $request->file('foto')->getClientOriginalName();
        //     $user->save();
        // }

        Auth::loginUsingId($user->id);

        return redirect()->route('pengaduan.index');
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }

    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('auth.profile', compact('user'));
    }

    public function update_profile(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/auth/profile')->with('Data diedit', 'Data berhasil diedit');
    }
}
