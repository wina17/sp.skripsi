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
    public function tambah()
    {
    	$penyakit 				= new \App\Penyakit();
		$data['penyakit'] 		= $penyakit;
		$data['action'] 	= 'PenyakitController@simpan';
		$data['btn_submit'] = 'Simpan';		
		$data['method'] 	= 'POST'; 
    	return view('backend/formPenyakit',$data);
    }
    public function simpan(Request $request)
    {
        //validasi input yang ada di form
        $validasi = $this->validate($request,[
            'nama'      => 'required',
            'solusi',            
            'kode'     => 'required|unique:penyakits',
        ]); 
        //ambil semua request
        $data = $request->all();
        //simpan data
        \App\Penyakit::create($data);        
        //kembalikan ke halaman sebelumnya
        return back()->with('pesan', ' Data sudah disimpan!');
    }
    public function hapus($id)
    {
        //cari user berdasarkan id yang ada di url
        $penyakit = \App\Penyakit::findOrFail($id);
        //jika user ditemukan, maka hapus
        $penyakit->delete();
        //arahkan ke halaman sebelumnya
        return back()->with('pesan', ' Data sudah dihapus!');
    }
    public function edit($id)
    {
        $penyakit = \App\Penyakit::findOrFail($id);
        $data['penyakit']  = $penyakit;
        $data['method'] = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action'] = array('PenyakitController@update', $id);            
        return view('backend/formPenyakit',$data);
    }
    public function update(Request $request, $id)
    {
        $penyakit = \App\Penyakit::findOrFail($id);
        $data = $request->all();
        $penyakit->update($data);
        return back()->with('pesan', ' Data sudah diubah!');
    }
}
