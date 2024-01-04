<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MitraControllers extends Controller
{
    function index()
    {
        return view('pointakses/mitra/index');
    }
}
