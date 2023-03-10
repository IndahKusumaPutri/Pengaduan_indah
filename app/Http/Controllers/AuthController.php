<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use App\user;
use App\Auth;


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

    public function indexPetugas()
    {
        $petugas = Auth::all();
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        $provinces = Province::all();
        return view('petugas.create', compact('provinces'));
    }
    
    public function store()
    {
        $petugas = Auth::all();

        $validate = Validator::make($petugas, [
            'nik' => ['required', 'min:16', 'max:16', 'unique:petugas'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string', 'unique:petugas'],
            'username' => ['required', 'string', 'regex:/^\S*$/u', 'unique:petugas', 'unique:petugas,username'],
            'jenis_kelamin' => ['required'],
            'password' => ['required', 'min:6'],
            'telp' => ['required', 'regex:/(08)[0-9]/'],
            'alamat' => ['required'],
            'rt' => ['required'],
            'rw' => ['required'],
            'kode_pos' => ['required'],
            'province_id' => ['required'],
            'regency_id' => ['required'],
            'district_id' => ['required'],
            'village_id' => ['required'],
        ]);

        Auth::create([
            'nik' => $petugas['nik'],
            'name' => $petugas['name'],
            'email' => $petugas['email'],
            'username' => strtolower($petugas['username']),
            'jenis_kelamin' => $petugas['jenis_kelamin'],
            'password' => Hash::make($petugas['password']),
            'telp' => $petugas['telp'],
            'alamat' => $petugas['alamat'],
            'email_verified_at' => Carbon::now(),
            'rt' => $petugas['rt'],
            'rw' => $petugas['rw'],
            'kode_pos' => $petugas['kode_pos'],
            'province_id' => $petugas['province_id'],
            'regency_id' => $petugas['regency_id'],
            'district_id' => $petugas['district_id'],
            'village_id' => $petugas['village_id'],
        ]);

        return redirect()->route('petugas.index');
    }

    public function getKota(Request $request)
    {
        $province_id = $request->province_id;
        $regencies = Regency::where('province_id', $province_id)->get();
        $option = "<option value=''>-- Pilih Kota/Kabupaten --</option>";
        foreach($regencies as $regency) {
            $option .= "<option value='$regency->id'>$regency->name</option>";
        }
        echo $option;
    }

    public function getKecamatan(Request $request)
    {
        $regency_id = $request->regency_id;
        $districts = District::where('regency_id', $regency_id)->get();
        $option = "<option value=''>-- Pilih Kecamatan --</option>";
        foreach($districts as $district) {
            $option .= "<option value='$district->id'>$district->name</option>";
        }
        echo $option;
    }

    public function getDesa(Request $request)
    {
        $district_id = $request->district_id;
        $villages = Village::where('district_id', $district_id)->get();
        $option = "<option value=''>-- Pilih Kelurahan/Desa --</option>";
        foreach($villages as $village) {
            $option .= "<option value='$village->id'>$village->name</option>";
        }
        echo $option;
    }
}
