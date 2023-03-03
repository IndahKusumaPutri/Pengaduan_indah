<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tanggapan;
use App\Pengaduan;

class HomeController extends Controller
{
    public function index()
    {
        return view('/home');
        // //$pinjam = date("06-09-2022");
        // $tujuh_hari = mktime(0,0,0, date("n"), date("j")+30, date("Y"));
        // $kembali = date("d-m-Y", $tujuh_hari);

        // $jumlah_tanggapan = Tanggapan::count();
        // $jumlah_pengaduan = Pengaduan::count();
        
        // return view('home')
        // ->with('jumlah_tanggapan',$jumlah_tanggapan)
        // ->with('jumlah_pengaduan',$jumlah_pengaduan)
        // ->with('kembali',$kembali);
    }
}