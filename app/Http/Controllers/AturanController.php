<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AturanController extends Controller
{
    public function index()
    {
        $data['aturans'] = \App\Aturan::latest()->paginate(10);
        return view('backend/dataAturan', $data);
    }
    public function tambah()
    {
    	$aturan 			= new \App\Aturan();
		$data['aturan'] 	= $aturan;
		$data['penyakit']	= \App\Penyakit::pluck('nama','id');
		$data['gejala']		= \App\Gejala::pluck('nama','id');
		$data['action'] 	= 'AturanController@simpan';
		$data['btn_submit'] = 'Simpan';		
		$data['method'] 	= 'POST'; 
    	return view('backend/formAturan',$data);
    }
    public function simpan(Request $request)
    {
        //validasi input yang ada di form
        $validasi = $this->validate($request,[
            'penyakit_id'      => 'required',
            'gejala_id'      => 'required',
            'cf_pakar'=> 'required',            
            'kode'     => 'required|unique:aturans',
        ]); 
        //ambil semua request
        $data = $request->all();
        //simpan data
        \App\Aturan::create($data);        
        //kembalikan ke halaman sebelumnya
        return back()->with('pesan', ' Data sudah disimpan!');
    }
    public function hapus($id)
    {
        //cari user berdasarkan id yang ada di url
        $aturan = \App\Aturan::findOrFail($id);
        //jika user ditemukan, maka hapus
        $aturan->delete();
        //arahkan ke halaman sebelumnya
        return back()->with('pesan', ' Data sudah dihapus!');
    }
    public function edit($id)
    {
        $aturan = \App\Aturan::findOrFail($id);
        $data['aturan']  = $aturan;
        $data['penyakit']	= \App\Penyakit::pluck('nama','id');
		$data['gejala']		= \App\Gejala::pluck('nama','id');
        $data['method'] = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action'] = array('AturanController@update', $id);            
        return view('backend/formAturan',$data);
    }
    public function update(Request $request, $id)
    {
        $aturan = \App\Aturan::findOrFail($id);
        $data = $request->all();
        $aturan->update($data);
        return back()->with('pesan', ' Data sudah diubah!');
    }
}