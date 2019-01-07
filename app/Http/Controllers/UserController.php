<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = \App\User::latest()->paginate(10);
        return view('backend/dataAdmin', $data);
    }

    public function tambah()
    {
    	$user 				= new \App\User();
		$data['user'] 		= $user;
		$data['action'] 	= 'UserController@simpan';
		$data['btn_submit'] = 'Simpan';		
		$data['method'] 	= 'POST'; 
    	return view('backend/formAdmin',$data);
    }
    public function simpan(Request $request)
    {
        return "a";
    }
    public function hapus($id)
    {
        //cari user berdasarkan id yang ada di url
        $user = \App\User::findOrFail($id);
        //jika user ditemukan, maka hapus
        $user->delete();
        //arahkan ke halaman sebelumnya
        return back()->with('pesan', 'Data sudah dihapus!');
    }
}
