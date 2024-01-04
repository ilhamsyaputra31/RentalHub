<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class CategoryProdukController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return view('pointakses.mitra.category_produk.index', ['categories' => $categories]);
    }
    function add()
    {
        return view('pointakses.mitra.category_produk.categoryproduk-Add');
    }
    function create(Request $request)
    {
        $request->validate(
            [
                'name',
            ]
        );
        $inforegister = [
            'name' => $request->fullname,
        ];
        Category::create($inforegister);
        session()->flash('success', 'Data berhasil ditambah');
        return redirect('categoryproduk');
    }


    function hapus(Request $request)
    {
        Category::where('id', $request->id)->delete();

        // Session::flash('success', 'Data berhasil dihapus');
        session()->flash('success', 'Data berhasil dihapus');

        return redirect('/categoryproduk');
    }
}
