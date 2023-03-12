<?php

namespace App\Http\Controllers;

use App\User;
use App\Pengaduan;
use Carbon\Carbon;
use App\Models\Pengaduan_Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MasyarakatController extends Controller
{
    public function index()
    {

        $pengaduan = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduan'));

    }

    public function create()
    {

        return view('pengaduan.create');

    }

    public function store(Request $request)
    {

        $this->validate($request, [

            'tgl_pengaduan' => 'required',
            'isi_laporan' => 'required',
            'foto.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000|required'

        ]);

        $uniqID = Carbon::now()->timestamp . uniqid();

        $data = new Pengaduan;
        $data->unique_id  = $uniqID;
        $data->tgl_pengaduan = $request->tgl_pengaduan;
        $data->nik = $request->nik;
        $data->isi_laporan = $request->isi_laporan;
        $data->status = '0';

        foreach ($request->foto as $key => $image) {
            $pimage = new Pengaduan_Image();
            $pimage->id_pengaduan = $uniqID;

            $imageName = Carbon::now()->timestamp . $key . '.' . $request->foto[$key]->extension();
            $request->foto[$key]->move(public_path("images"), $imageName);

            $pimage->foto = $imageName;
            $pimage->save();
        }

        $data->save();

        return redirect()->route('pengaduan.index')->with('Data ditambah', 'Data berhasil ditambah');
    } 
}
