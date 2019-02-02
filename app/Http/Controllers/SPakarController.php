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
        //simpan data pasien
        \App\Pasien::create($data);
        $pasien = \App\Pasien::latest()->take(1)->first();        
        \Session::put('pasien_id',$pasien->id);
        return redirect('/sistemPakar/pertanyaan');
    }
    public function pertanyaan(){
        $gejalas = \App\Gejala::orderBy('kode','asc')->get();
        $data['gejalas']    = $gejalas;
        $data['action']     = 'SPakarController@simpanDiagnosa';
        $data['btn_submit'] = 'Simpan';     
        $data['method']     = 'POST'; 
        return view('frontend/sistemPakarPertanyaan',$data);
    }
    public function simpanDiagnosa(Request $request)
    {
        $gejala_id_array    = $request->gejala_id;
        $jawaban_array      = $request->jawaban;
        $pasien_id = \Session::get('pasien_id');            
        for($i=0;$i<count($gejala_id_array);$i++)
        {
            $gejala_id = $gejala_id_array[$i];
            $jawaban   = $jawaban_array[$gejala_id];                        

            $data['pasien_id']  = $pasien_id;
            $data['gejala_id']  = $gejala_id;
            $data['jawaban']    = $jawaban;
            
            $tabel=new \App\Diagnosa();
            $tabel->pasien_id=$pasien_id;
            $tabel->gejala_id=$gejala_id;
            $tabel->jawaban=$jawaban;
            $tabel->save();
        }
        $i = 0;
        $penyakits= \DB::select("select *from aturans group by penyakit_id");
        $penyakits = \collect($penyakits);
        foreach ($penyakits as $penyakit) {        
            $penyakit_id = $penyakit->penyakit_id;
            $diagnosa =\App\Diagnosa::wherePasienId($pasien_id)->get();
            foreach ($diagnosa as $v) {
                $gejala_id = $v->gejala_id;
                $jawaban   = $v->jawaban;
                $aturan = \App\Aturan::whereGejalaId($gejala_id)
                                        ->wherePenyakitId($penyakit_id)->first();
                if($aturan)
                {
                    //echo "$penyakit_id : $gejala_id $jawaban <br>";                    
                    //$i++;
                    //echo "$i <br>";
                    $aturan = $aturan->first();
                    $cf_pakar = $aturan->cf_pakar;
                    //echo "$gejala_id $jawaban $cf_pakar <br>";
                    //cf(h,e)
                    $cf_he = $jawaban*$cf_pakar;
                    $hitung = new \App\Hitung();
                    $hitung->penyakit_id = $penyakit_id;
                    $hitung->gejala_id = $gejala_id;
                    $hitung->cf_he = $cf_he;
                    $hitung->pasien_id = $pasien_id;
                    $hitung->save();
                }                
            }
        }
        return redirect('sistemPakar/hasil');
    }
    public function hasil()
    {
        $pasien_id = \Session::get('pasien_id');        
        $penyakits= \DB::select("select *from aturans group by penyakit_id");
        $penyakits = \collect($penyakits);
        foreach ($penyakits as $penyakit) {
            $cf_he = 0;
            $penyakit_id = $penyakit->penyakit_id;
            echo "<h1>$penyakit_id</h1>";
            $diagnosa =\App\Hitung::wherePasienId($pasien_id)
                                    ->wherePenyakitId($penyakit_id)->get();
            foreach ($diagnosa as $v) {
                $cf_combine = $v->cf_he;
                $gejala_id = $v->gejala_id;
                $aturan = \App\Aturan::whereGejalaId($gejala_id)
                                       ->wherePenyakitId($penyakit_id)
                                       ->first();
                $cf2   = $v->jawaban;            
               // $cf_he = $v->cf_he;
               // $cf_combine = $cf_combine+($cf2 * (1 - $cf_combine));               
               echo "Gejala $gejala_id : Penyakit $penyakit_id <br>";
                echo "$cf_combine = $cf_he+$v->cf_he * (1 - $cf_he) <br>";
                $cf_he = $cf_he+$v->cf_he * (1 - $cf_he);
            } 
            $presentase = $cf_he*100;
            echo "$presentase";  
            echo "<hr />";
        }
    }    
}
