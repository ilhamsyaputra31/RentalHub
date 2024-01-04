<?php

namespace App\Http\Controllers;

use App\Models\ManajemenProduks;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SistemPenyewaan;
use Illuminate\Support\Facades\Auth;

class sistem_penyewaan extends Controller
{
    function index()
    {
        $userId = Auth::id();
        $data = SistemPenyewaan::where('user_id', '=', $userId)->get();
        // $data = User::all();

        return view('pointakses.mitra.sistem_penyewaan.index', ['sistem_penyewaan' => $data]);
    }
    function tambahorder()
    {
        $userId = Auth::id();
        $data = ManajemenProduks::pluck('nama_barang', 'id');

        return view('pointakses.mitra.sistem_penyewaan.tambah', ['sistem_penyewaan' => $data]);
    }
    function createorder(Request $request)
    {
        // dd($request);
        $str = Str::random(100);
        $userId = Auth::id();


        $request->validate([
            'nama_penyewa' => 'required',
            'manajemen_produks_id' => 'required',
            'rent_date' => 'required|min:6',
            'return_date' => 'required|min:6',

        ], [
            'nama_penyewa.required' => 'Nama Barang Wajib Di isi',
            'manajemen_produks_id.required' => 'Harga Wajib Di isi',
            'rent_date.required' => 'rent_date Wajib Di isi',
            'return_date.required' => 'return_date Wajib Di isi',

        ]);



        $accounts = SistemPenyewaan::create([
            'user_id' => $userId,
            'nama_penyewa' => $request->nama_penyewa,
            'manajemen_produks_id' => $request->manajemen_produks_id,
            'rent_date' => $request->rent_date,
            'return_date' => $request->return_date,

        ]);

        session()->flash('success', 'Data berhasil ditambahkan.');

        return redirect('/penyewaan');
    }
    public function edit($id)
    {
        $order = SistemPenyewaan::where('id', $id)->get();
        return view('pointakses/mitra/sistem_penyewaan.edit', ['order' => $order]);
    }

    function change(Request $request)
    {
        $request->validate([
            'nama_penyewa' => 'required',
            'rent_date' => 'required',
            'return_date' => 'required',
        ]);

        $order = SistemPenyewaan::find($request->id);

      
        $order->nama_penyewa = $request->nama_penyewa;
        $order->rent_date = $request->rent_date;
        $order->return_date = $request->return_date;
        $order->save();

        session()->flash('success', 'Data berhasil diedit');

        return redirect('/penyewaan');
    }
    function hapus(Request $request)
    {
        SistemPenyewaan::where('id', $request->id)->delete();

        Session()->flash('success', 'Data berhasil dihapus');

        return redirect('/penyewaan');
    }
}
