<?php

namespace App\Http\Controllers\Wadir;

use App\Http\Controllers\Controller;
use App\Models\IzinKegiatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IzinKegiatanController extends Controller
{
    public  function index()
    {
        return DB::transaction(function() {
            $data["izin_kegiatan"] = IzinKegiatan::get();

            return view('wadir.izin_kegiatan.index', $data);
        });
    }

    public function show($id)
    {
        return DB::transaction(function() use ($id) {
            $data["detail"] = IzinKegiatan::where("id", $id)->first();

            return view('wadir.izin_kegiatan.detail', $data);
        });
    }

    public function update(Request $request, $id)
    {
        return DB::transaction(function() use ($request, $id) {
            IzinKegiatan::where("id", $id)->update([
                "status" => $request["status"],
                "user_validasi_id" => Auth::user()->id
            ]);

            return redirect("/wadir/izin_kegiatan");
        });
    }
}
