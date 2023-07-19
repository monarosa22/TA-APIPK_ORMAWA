<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\IzinKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class IzinKegiatanController extends Controller
{
    public function index()
    {
        return DB::transaction(function (){
            $data["izin_kegiatan"] = IzinKegiatan::get();

            return view("ormawa.izin_kegiatan.index", $data);
        });
    }

    public function create()
    {
        return view("ormawa.izin_kegiatan.create");
    }

    public function store(Request $request)
    {
        return DB::transaction(function() use  ($request) {

            if ($request["unggah_file"]) {
                $data = $request->file("unggah_file")->store("file_surat");
            }

            IzinKegiatan::create([
                "id" => Uuid::uuid4()->getHex(),
                "user_id" => Auth::user()->id,
                "nama_kegiatan" => $request["nama_kegiatan"],
                "tempat" => $request["tempat_pelaksanaan"],
                "mulai" => $request["mulai"],
                "akhir" => $request["akhir"],
                "file_surat" => $data
            ]);

            return redirect("/ormawa/izin_kegiatan");
        });
    }

    public function show($id)
    {
        return DB::transaction(function () use ($id) {
            $data["detail"] = IzinKegiatan::where("id", $id)->first();

            return view("ormawa.izin_kegiatan.detail", $data);
        });
    }

    public function  destroy($id)
    {
        return DB::transaction(function() use ($id) {
            IzinKegiatan::where("id", $id)->delete();

            return back();
        });
    }

}
