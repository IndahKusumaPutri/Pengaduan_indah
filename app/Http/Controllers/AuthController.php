<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use App\Petugas;
use App\User;


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

        $userId = User::create([
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

        Auth::loginUsingId($userId);

        return redirect()->route('dashboard');
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
        $petugas = Petugas::all();
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        $provinces = Province::all();
        return view('petugas.create', compact('provinces'));
    }
    
    public function store(Request $request)
    {
        $petugas = Petugas::all();

        $this->validate($request,[
            'nik' => 'required|max:16',
            'name' => 'required',
            'email' => 'required',
            'email_verified_at' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'jenis_kel' => 'required',
            'level' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kode_pos' => 'required',
        ]);

        // $validate = Validator::make($request->(), [
        //     'nik' => 'required', 'min:16', 'max:16', 'unique:petugas',
        //     'name' => ['required', 'string'],
        //     'email' => ['required', 'email', 'string', 'unique:petugas'],
        //     'username' => ['required', 'string', 'regex:/^\S*$/u', 'unique:petugas', 'unique:petugas,username'],
        //     'jenis_kelamin' => ['required'],
        //     'password' => ['required', 'min:6'],
        //     'telp' => ['required', 'regex:/(08)[0-9]/'],
        //     'alamat' => ['required'],
        //     'rt' => ['required'],
        //     'rw' => ['required'],
        //     'kode_pos' => ['required'],
        //     'province_id' => ['required'],
        //     'regency_id' => ['required'],
        //     'district_id' => ['required'],
        //     'village_id' => ['required'],
        // ]);

        Petugas::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => Carbon::now(),
            'password' => $request->password,
            'telp' => $request->telp,
            'jenis_kel' => $request->jenis_kel,
            'level' => $request->level,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kode_pos' => $request->kode_pos,
            'province_id' => $request->province_id,
            'regency_id' => $request->regency_id,
            'district_id' => $request->district_id,
            'village_id' => $request->village_id
            // 'username' => strtolower($petugas['username'])
        ]);

        User::create([
            'name'      => bcrypt($request->name),
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        return redirect()->route('petugas.index');
    }

    public function getKota(Request $request)
    {
        $province_id = $request->province_id;
        $regencies = Regency::where('province_id', $province_id)->get();

        $option = "<option>Pilih Kota...</option>";
        foreach ($regencies as $kota ) {
            $option.= "<option value='$kota->id'>$kota->name</option>";  
        }

        echo$option;
    }

    public function getKecamatan(Request $request)
    {
        $regency_id = $request->regency_id;
        $districts = District::where('regency_id', $regency_id)->get();

        $option = "<option>Pilih Kecamatan...</option>";
        foreach ($districts as $kecamatan ) {
            $option.= "<option value='$kecamatan->id'>$kecamatan->name</option>";  
        }

        echo $option;
    }

    public function getKelurahan(Request $request)
    {
        $village_id = $request->village_id;
        $villages = Village::where('district_id', $village_id)->get();

        $option = "<option>Pilih Kelurahan...</option>";
        foreach ($villages as $kelurahan ) {
            $option.= "<option value='$kelurahan->id'>$kelurahan->name</option>";  
        }

        echo $option;
    }

}
