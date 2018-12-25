<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
    	$data['gejalas'] = \App\Gejala::latest()->paginate(10);
    	return view('backend/dataGejala', $data);
    }
}
