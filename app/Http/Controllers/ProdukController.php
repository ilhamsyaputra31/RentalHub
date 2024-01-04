<?php

namespace App\Http\Controllers;

use App\Models\ManajemenProduks;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{

    function index()
    {
        $userId = Auth::id();
        $data = ManajemenProduks::where('user_id', '=', $userId)->get();

        return view('pointakses.mitra.produk_mitra.index', ['data' => $data]);
    }

    function tambahproduk()
    {
        return view('pointakses.mitra.produk_mitra.tambah');
    }
    function createproduk(Request $request)
    {
        $str = Str::random(100);
        $gambar = '';
        $userId = Auth::id();


        $request->validate([
            'nama_barang' => 'required',
            'harga_sewa' => 'required',
            'deskripsi_barang' => 'required|min:6',
            'Ringkasan' => 'required|min:6',

        ], [
            'nama_barang.required' => 'Nama Barang Wajib Di isi',
            'harga_sewa.required' => 'Harga Wajib Di isi',
            'deskripsi_barang.required' => 'Deskripsi Wajib Di isi',
            'Ringkasan.required' => 'Ringkasan Wajib Di isi',

        ]);


        if ($request->hasFile('gambar')) {

            $request->validate(['gambar' => 'mimes:jpeg,jpg,png,gif|image|file|max:5000']);

            $gambar_file = $request->file('gambar');
            $foto_ekstensi = $gambar_file->extension();
            $nama_foto = date('ymdhis') . "." . $foto_ekstensi;
            $gambar_file->move(public_path('picture/accounts'), $nama_foto);
            $gambar = $nama_foto;
        } else {
            $gambar = "user.jpeg";
        }

        $accounts = ManajemenProduks::create([
            'user_id' => $userId,
            'nama_barang' => $request->nama_barang,
            'harga_sewa' => $request->harga_sewa,
            'deskripsi_barang' => $request->deskripsi_barang,
            'Ringkasan' => $request->Ringkasan,
            'gambar' => $gambar,

        ]);

        session()->flash('success', 'Data berhasil ditambahkan.');

        return redirect('/produk');
    }

    public function edit($id)
    {
        $data = ManajemenProduks::where('id', $id)->get();
        return view('pointakses/mitra/produk_mitra.edit', ['data' => $data]);
    }

    function change(Request $request)
    {
        // dd($request);
        $request->validate([
            'gambar' => 'image|file|max:1024',
            'nama_barang' => 'required',
            'harga_sewa' => 'required',
            'deskripsi_barang' => 'required',
            'Ringkasan' => 'required',
        ]);

        $produk = ManajemenProduks::find($request->id);

        if ($request->hasFile('gambar')) {
            $gambar_file = $request->file('gambar');
            $foto_ekstensi = $gambar_file->extension();
            $nama_foto = date('ymdhis') . "." . $foto_ekstensi;
            $gambar_file->move(public_path('gambar'), $nama_foto);
            $produk->gambar = $nama_foto;
        }

        $produk->nama_barang = $request->nama_barang;
        $produk->harga_sewa = $request->harga_sewa;
        $produk->deskripsi_barang = $request->deskripsi_barang;
        $produk->Ringkasan = $request->Ringkasan;
        $produk->save();

        session()->flash('success', 'Data berhasil diedit');


        return redirect('/produk');
    }
    function hapus(Request $request)
    {
        ManajemenProduks::where('id', $request->id)->delete();

        Session()->flash('success', 'Data berhasil dihapus');

        return redirect('/produk');
    }
}
