<?php

namespace App\Http\Controllers\Autentikasi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view("autentikasi.login");
    }

    public function post_login(Request $request)
    {
        $pesan = [
            "required" => "Kolom :attribute harus diisi!",
            "email" => "Kolom :attribute harus disertai '@'",
            "min" => "Kolom :attribute minimal harus :min karakter!"
        ];
        $this->validate($request, [
            "email" => "required|email
            ",
            "password" => "required|min:8",
        ], $pesan);

        $cek = User::where("email", $request->email)->first();

        if ($cek) {
            if (Hash::check($request->password, $cek->password)) {
                if ($cek->status == 1 ){
                    if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                        $request->session()->regenerate();

                        $cek = User::where("id", Auth::user()->id)->first();

                        if ($cek["role"] == "admin") {
                            return redirect("/super_admin/dashboard")->with("message", "Berhasil Login");
                        } else if ($cek["role"] == "wadir") {
                            return redirect("/wadir/dashboard")->with("message", "Berhasil Login");
                        } else if ($cek["role"] == "ormawa") {
                            return redirect("/ormawa/dashboard")->with("message", "Berhasil Login");
                        }

                    } else {
                        return back();
                    }
                } else {
                    // Jika akun tidak aktif
                    return back()->with("message", "Akun Anda Tidak Aktif!")->withInput();
                }
            } else {
                //Jika password salah
                return back()->with("message", "Password Anda Salah!")->withInput();
            }
        } else {
            // Jika email tidak terdaftar
            return back()->with("message", "Email Tidak Terdaftar!")->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/login");
    }
}
