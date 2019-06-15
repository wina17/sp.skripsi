<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ArtikelController extends Controller
{
    public function index()
    {
        $data['artikels'] = \App\Artikel::latest()->paginate(10);
        return view('backend/dataArtikel', $data);
    }
}