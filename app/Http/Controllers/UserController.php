<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Collective\Html\HtmlFacade;
use Collective\Html\FormFacade;

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
		$data['btn_submit'] = 'SIMPAN';		
		$data['method'] 	= "POST"; 
    	return view('backend/formAdmin',$data);
    }

    public function simpan(Request $request)
    {
    	//validasi input yang ada di form
    	$validasi = $this->validate($request,[
            'name' 		=> 'required|unique:users',
            'password' 	=> 'required|confirmed',            
            'email' 	=> 'required|email|unique:users'
        ]); 
        //ambil semua request
        $data = $request->except('password_confirmation');
        //modifikasi request
        $data['password'] = \Hash::make($request->password);
        //simpan user
        \App\User::create($data);        
        //kembalikan ke halaman sebelumnya
        return back()->with('pesan', 'Data sudah disimpan!');
    }
}
