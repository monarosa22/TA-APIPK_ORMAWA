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
            $data["izin_kegiatan"] = IzinKegiatan::orderBy("created_at", "ASC")->get();

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

    public function download_surat($id)
    {
        return DB::transaction(function () use ($id) {
            $data = IzinKegiatan::where("id", $id)->first();

            return response()->download("storage/".$data["file_surat"]);
        });
    }

    // public function surat_balasan($id)
    // {
    //     return DB::transaction(function () use ($id) {
    //         $data = IzinKegiatan::where("id", $id)->first();

    //         return response()->download("storage/".$data["file_surat_balasan"]);
    //     });
    // }

    public function update(Request $request, $id)
    {

        $pesan = [
            'required' => "Kolom :attribute harus diisi!"
        ];

        $this->validate($request, [
            "status" => "required"
        ], $pesan);

        return DB::transaction(function() use ($request, $id) {

            if ($request->komentar) {
                $komentar = $request->komentar;
            } else {
                $komentar = null;
            }

            IzinKegiatan::where("id", $id)->update([
                "status" => $request["status"],
                "user_validasi_id" => Auth::user()->id,
                "komentar" => $komentar
            ]);

            return redirect("/wadir/izin_kegiatan")->with("message", "Data Berhasil Dikonfirmasi");
        });
    }
}
