<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
    	$data['penyakits'] = \App\Penyakit::latest()->paginate(10);
    	return view('backend/dataPenyakit', $data);
    }
}
