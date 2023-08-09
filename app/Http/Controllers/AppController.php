<?php

namespace App\Http\Controllers;

use App\Models\IzinKegiatan;
use App\Models\LaporanKegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function dashboard_admin()
    {

        $data = [
            "izin_kegiatan" => IzinKegiatan ::count(),
            "kegiatan_ditolak" => IzinKegiatan ::where("status", "2")->count(),
            "kegiatan_disetujui" => IzinKegiatan ::where("status", "1")->count(),
            "laporan_kegiatan" => LaporanKegiatan ::count(),
            "pengguna" => User ::count(),
        ];

        return view("super_admin.dashboard", $data);
    }

    public function dashboard_wadir()
    {

        $data = [
            "izin_kegiatan" => IzinKegiatan ::where("status", "0")->count(),
            "kegiatan_ditolak" => IzinKegiatan ::where("status", "2")->count(),
            "kegiatan_disetujui" => IzinKegiatan ::where("status", "1")->count(),
            "laporan_kegiatan" => LaporanKegiatan ::count(),
        ];

        $kegiatan = IzinKegiatan::get();

        $dataperbulan = [];

        for ($bulan = 1; $bulan <= 12; $bulan++) {
            $dataperbulan[$bulan] = 0;
        }

        foreach ($kegiatan as $izin) {
            $bulan = date('n', strtotime($izin->created_at));
            $dataperbulan[$bulan]++;
        }

        return view("wadir.dashboard", $data, compact("kegiatan", "dataperbulan"));
    }

    public function dashboard_ormawa()
    {

        $data = [
            "izin_kegiatan" => IzinKegiatan ::where("user_id", Auth::user()->id)->count(),
            "kegiatan_ditolak" => IzinKegiatan ::where("user_id", Auth::user()->id)->where("status", "2")->count(),
            "kegiatan_disetujui" => IzinKegiatan ::where("user_id", Auth::user()->id)->where("status", "1")->count(),
            "laporan_kegiatan" => LaporanKegiatan ::where("user_id", Auth::user()->id)->count(),
        ];

        return view("ormawa.dashboard", $data);
    }
}
