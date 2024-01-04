<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\AuthMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AuthControllers extends Controller
{
    function index()
    {
        return view('halaman_auth/login');
    }
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();


                return redirect()->route('auth')->withErrors('Email Anda belum aktif, silahkan melakukan pembayaran terlebih dahulu, Dan hubungi Admin');
            }

            if (Auth::user()->role_id == 1) {
                return redirect('admin');
            }
            if (Auth::user()->role_id == 2) {
                return redirect('mitra');
            }
        } else {
            return redirect()->route('auth')->withErrors('Email atau password salah');
        }
    }
    function register(Request $request)
    {
        $str = Str::random(100);
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
            'gambar' => 'required|image|file',
        ], [
            'fullname.required' => 'Fullname wajib di isi',
            'email.required' => 'Email wajib di isi',
            'email.unique' => 'Email telah terdaftar',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Password minimal 6 karakter',
            'gambar.required' => 'Gambar wajib di isi',
            'gambar.image' => 'Gambar yang di upload harus image',
            'gambar.file' => 'Gambar harus berupa file',
        ]);

        $gambar_file = $request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $nama_gambar = date('ymdhis') . "." . $gambar_ekstensi;
        $gambar_file->move(public_path('picture/accounts'), $nama_gambar);

        $inforegister = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password,
            'gambar' => $nama_gambar,
            'verify_key' => $str

        ];

        User::create($inforegister);
        return redirect('/sesi');
        session()->flash('success', 'Anda Telah Berhasil Register, Silahkan Hubungi Admin Untuk Memverifikasi Akun Anda');
    }
    function logout()
    {
        Auth::logout();
        return Redirect('/');
    }
}
