<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Regency;
use App\Models\Village;

class IndoRegionController extends Controller
{
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
