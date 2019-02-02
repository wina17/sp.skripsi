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
    public function tambah()
    {
    	$gejala 				= new \App\Gejala();
		$data['gejala'] 		= $gejala;
		$data['action'] 	= 'GejalaController@simpan';
		$data['btn_submit'] = 'Simpan';		
		$data['method'] 	= 'POST'; 
    	return view('backend/formGejala',$data);
    }
    public function simpan(Request $request)
    {
        //validasi input yang ada di form
        $validasi = $this->validate($request,[
            'nama'      => 'required',
            'detail',
            'pertanyaan'=> 'required',            
            'kode'      => 'required|unique:gejalas',
        ]); 
        //ambil semua request
        $data = $request->all();
        //simpan data
        \App\Gejala::create($data);        
        //kembalikan ke halaman sebelumnya
        return back()->with('pesan', ' Data sudah disimpan!');
    }
    public function hapus($id)
    {
        //cari user berdasarkan id yang ada di url
        $gejala = \App\Gejala::findOrFail($id);
        //jika user ditemukan, maka hapus
        $gejala->delete();
        //arahkan ke halaman sebelumnya
        return back()->with('pesan', ' Data sudah dihapus!');
    }
    public function edit($id)
    {
        $gejala = \App\Gejala::findOrFail($id);
        $data['gejala']  = $gejala;
        $data['method'] = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action'] = array('GejalaController@update', $id);            
        return view('backend/formGejala',$data);
    }
    public function update(Request $request, $id)
    {
        $gejala = \App\Gejala::findOrFail($id);
        $data = $request->all();
        $gejala->update($data);
        return back()->with('pesan', ' Data sudah diubah!');
    }
}