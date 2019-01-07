<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SPakarController extends Controller
{
    public function index(){
    	$pasien 			= new \App\Pasien();
		$data['pasien'] 	= $pasien;
		$data['action'] 	= 'SPakarController@simpan';
		$data['btn_submit'] = 'Selanjutnya';		
		$data['method'] 	= 'POST'; 
    	return view('frontend/sistemPakar',$data);
    }
    public function simpan(Request $request)
    {
        //validasi input yang ada di form
    	$validasi = $this->validate($request,[
            'nama_anjing' 		=> 'required',
            'umur_anjing' 	    => 'required',            
            'jekel_anjing' 		=> 'required',
            'nama_pemilik' 		=> 'required',
            'nohp_pemilik' 		=> 'required',
        ]); 
        //ambil semua request
        $data = $request->all();
        //simpan user
        \App\Pasien::create($data);        
        //kembalikan ke halaman sebelumnya
        return back()->with('pesan', 'Data sudah disimpan!');
    }
}
