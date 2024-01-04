<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DatamitraControllers extends Controller
{
    function index()
    {
        $data = User::where('role_id', 2,)->where('status', 'active')->get();
        return view('pointakses/admin/data_mitra.index', ['uc' => $data]);
    }

    function RegisteredUser()
    {
        $registeredUser = User::where('status', 'inactive')->get();
        return view('pointakses/admin/data_mitra.registereduser', ['registeredUser' => $registeredUser]);
    }

    function approve($id)
    {
        $user = User::where('id', $id)->first();
        $user->status = 'active';
        $user->save();

        session()->flash('success', 'Data berhasil diedit'); 
        return redirect('/registed-user');

        // dd($id);
    }

    function hapus(Request $request)
    {
        User::where('id', $request->id)->delete();

        Session::flash('success', 'Data berhasil dihapus');

        return redirect('/datamitra');
    }
}
