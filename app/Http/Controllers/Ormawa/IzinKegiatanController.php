<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\IzinKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class IzinKegiatanController extends Controller
{
    public function index()
    {
        return DB::transaction(function (){
            $data["izin_kegiatan"] = IzinKegiatan::where("user_id", Auth::user()->id)->get();

            return view("ormawa.izin_kegiatan.index", $data);
        });
    }

    public function create()
    {
        return view("ormawa.izin_kegiatan.create");
    }

    public function store(Request $request)
    {
        $pesan = [
            'required' => "Kolom :attribute harus diisi!"
        ];

        $this->validate($request, [
            "nama_kegiatan" => "required",
            "mulai" => "required",
            "akhir" => "required",
            "tempat" => "required",
            "unggah_file" => "required",
        ], $pesan);

        return DB::transaction(function() use  ($request) {

            if ($request["unggah_file"]) {
                $data = $request->file("unggah_file")->store("file_surat");
            }

            IzinKegiatan::create([
                "id" => Uuid::uuid4()->getHex(),
                "user_id" => Auth::user()->id,
                "nama_kegiatan" => $request["nama_kegiatan"],
                "tempat" => $request["tempat"],
                "mulai" => $request["mulai"],
                "akhir" => $request["akhir"],
                "file_surat" => $data
            ]);

            return redirect("/ormawa/izin_kegiatan")->with("message", "Data Berhasil Ditambahkan");
        });
    }

    public function edit($id)
    {
        return DB::transaction(function () use ($id) {
            $data["edit"] = IzinKegiatan::where("id", $id)->first();

            return view("ormawa.izin_kegiatan.edit", $data);
        });
    }

    public function update(Request $request, $id)
    {
        $pesan = [
            'required' => "Kolom :attribute harus diisi!"
        ];

        $this->validate($request, [
            "nama_kegiatan" => "required",
            "mulai" => "required",
            "akhir" => "required",
            "tempat" => "required",
        ], $pesan);

        return DB::transaction(function () use ($request, $id) {

            if ($request->file("unggah_file")) {
                if ($request->file_lama) {
                    Storage::delete($request->file_lama);
                }

                $data = $request->file("unggah_file")->store("file_surat");

            } else {
                $data = $request->file_lama;
            }

            IzinKegiatan::where("id", $id)->update([
                "nama_kegiatan" => $request["nama_kegiatan"],
                "tempat" => $request["tempat"],
                "mulai" => $request["mulai"],
                "akhir" => $request["akhir"],
                "file_surat" => $data
            ]);

            return redirect("/ormawa/izin_kegiatan")->with("message", "Data Berhasil Disimpan");
        });
    }

    public function show($id)
    {
        return DB::transaction(function () use ($id) {
            $data["detail"] = IzinKegiatan::where("id", $id)->first();

            return view("ormawa.izin_kegiatan.detail", $data);
        });
    }

    public function destroy($id)
    {
        return DB::transaction(function () use ($id) {
            $izin_kegiatan = IzinKegiatan::where("id", $id)->first();

            Storage::delete($izin_kegiatan->file_surat);

            $izin_kegiatan->delete();

            return back()->with("message", "Data Berhasil Dihapus");
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

            // public function  destroy($id)
            // {
            //     return DB::transaction(function() use ($id) {
            //         IzinKegiatan::where("id", $id)->delete();

            //         return back();
            //     });
            // }

        }
