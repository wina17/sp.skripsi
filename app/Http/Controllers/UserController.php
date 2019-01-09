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
        //validasi input yang ada di form
        $validasi = $this->validate($request,[
            'name'      => 'required|unique:users',
            'password'  => 'required|confirmed',            
            'email'     => 'required|email|unique:users'
        ]); 
        //ambil semua request
        $data = $request->except('password_confirmation');
        //modifikasi request
        $data['password'] = \Hash::make($request->password);
        //simpan user
        \App\User::create($data);        
        //kembalikan ke halaman sebelumnya
        return back()->with('pesan', ' Data sudah disimpan!');
    }
    public function hapus($id)
    {
        //cari user berdasarkan id yang ada di url
        $user = \App\User::findOrFail($id);
        //jika user ditemukan, maka hapus
        $user->delete();
        //arahkan ke halaman sebelumnya
        return back()->with('pesan', ' Data sudah dihapus!');
    }

    public function edit($id)
    {
        $user = \App\User::findOrFail($id);
        $data['user']  = $user;
        $data['method'] = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action'] = array('UserController@update', $id);            
        return view('backend/formAdmin',$data);
    }

    public function update(Request $request, $id)
    {
        $user = \App\User::findOrFail($id);
        $validasi = $this->validate($request,[
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $data = $request->except('password_confirmation');
        $data['password'] = \Hash::make($request->password);        
        $user->update($data);
        return back()->with('pesan', ' Data sudah diubah!');
    }
}
