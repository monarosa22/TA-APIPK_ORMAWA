<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\IzinKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IzinKegiatanController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {
            $data["izin_kegiatan"] = IzinKegiatan::get();

            return view('super_admin.izin_kegiatan.index', $data);
        });
    }

    public function show($id)
    {
        return DB::transaction(function() use ($id) {
            $data["detail"] = IzinKegiatan::where("id", $id)->first();

            return view('super_admin.izin_kegiatan.detail', $data);
        });
    }

    public function update(Request $request, $id)
    {
        return DB::transaction(function() use ($request, $id) {
            if ($request->file("file_surat_balasan")) {
                $data = $request->file("file_surat_balasan")->store("file_surat_balasan");
            }
            IzinKegiatan::where("id", $id)->update([
                "file_surat_balasan" => $data
            ]);

            return redirect("/super_admin/izin_kegiatan");
        });
    }
}
