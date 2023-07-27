<?php

namespace App\Http\Controllers\Ormawa;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GantiPasswordController extends Controller
{
    public function index()
    {
        return DB::transaction(function (){

            return view("ormawa.ganti_password.index");
        });
    }

    public function update(Request $request,$id_user)
    {
        return DB::transaction(function() use ($request, $id_user) {

            if ($request->konfirmasi_password != $request->password_baru) {
                return redirect("/ormawa/ganti_password")->with("error", "Konfirmasi Password Tidak Sesuai!");
            } else {
                User::where("id", $id_user)->update([
                    "password" => bcrypt($request->password_baru)
                ]);

                return back()->with("success", "Password Berhasil diperbarui!");
            }
        });
    }
}
