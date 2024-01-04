<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminControllers extends Controller
{
    function index()
    {
        return view('pointakses/admin/index');
    }
}
