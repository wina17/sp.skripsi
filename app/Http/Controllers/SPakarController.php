<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class SPakarController extends Controller
{
    public function index(){
        \Session::put('pasien_id',"");
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
        \Session::put('periksa_id',"");
        $pasien_id = \Session::get('pasien_id');
        if ($pasien_id == "") 
        {
            return redirect('mulai');    
        }
        $pasien  = \App\Pasien::findOrFail($pasien_id);
        $gejalas = \App\Gejala::orderBy('kode','asc')->get();
        $data['gejalas']    = $gejalas;
        $data['action']     = 'SPakarController@simpanDiagnosa';
        $data['btn_submit'] = 'Simpan';     
        $data['method']     = 'POST'; 
        $data['pasien']     = $pasien;
        return view('frontend/sistemPakarPertanyaan',$data);
    }

    public function simpanDiagnosa(Request $request)
    {
        /* 
        STEP KE-1
        Menyimpan seluruh jawaban kuisioner yang dipilih oleh user pada tabel *diagnosas*
        */
        $periksa = new \App\Periksa();
        $periksa->pasien_id=\Session::get('pasien_id');
        $periksa->kode=str_random(4);
        $periksa->save();
        $periksa_id=$periksa->id;
        \Session::put('periksa_id', $periksa_id);

        $gejala_id_array    = $request->gejala_id;
        $jawaban_array      = $request->jawaban;
        $pasien_id          = \Session::get('pasien_id');            
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
            $tabel->periksa_id=$periksa_id;
            $tabel->save();
        }

        /* 
        STEP KE-2
        Pencarian nilai CF(h,e) berdasarkan rumus: 
        CF(H,E) = CF(E) * CF(Rule)
        Dimana,
        CF(E), didapatkan dari user (jawaban kuisioner pada sistem)
        CF(Rule), didapatkan dari pakar (jawaban kuisioner pada saat wawancara penentuan nilai oleh pakar)
        Dengan catatan:
        1) CF(H,E) dihitung berdasarkan setiap gejala penyakit
        2) Nilai bobot CF(H,E) pada *gejala penyakit yang sama, tetapi jenis penyakit berbeda* maka nilai bobot masing2 bisa jadi berbeda

        Lalu CF(H,E) akan bertransformasi menjadi variabel CF1, CF2, ..., CF-n
        */
        $i = 0;
        $penyakits = \DB::select("select *from aturans group by penyakit_id");
        $penyakits = \collect($penyakits);
        foreach ($penyakits as $penyakit) {        
            $penyakit_id = $penyakit->penyakit_id;
            $diagnosa =\App\Diagnosa::wherePasienId($pasien_id)->wherePeriksaId($periksa_id)->get();
            foreach ($diagnosa as $v) {
                $gejala_id = $v->gejala_id;
                $jawaban   = $v->jawaban;
                $aturan    = \App\Aturan::whereGejalaId($gejala_id)
                                        ->wherePenyakitId($penyakit_id);
                if($aturan->exists())
                {
                    $aturan   = $aturan->first();
                    $cf_pakar = $aturan->cf_pakar;
                    $cf_he    = $jawaban*$cf_pakar;
                    $hitung   = new \App\Hitung();
                    $hitung->penyakit_id = $penyakit_id;
                    $hitung->gejala_id   = $gejala_id;
                    $hitung->cf_he       = $cf_he;
                    $hitung->pasien_id   = $pasien_id;
                    $hitung->periksa_id   = $periksa_id;
                    $hitung->save();
                }                
            }
        }
        return redirect('sistemPakar/hasil');
    }

    /* 
    STEP KE-3
    Melakukan perhitungan nilai CF pada setiap penyakit berdasarkan rumus:
    CFcombine = CF1 + CF2 * (1 - CF1)
    */
    public function hasil()
    {
        /*$a = 0.2+(0.8 * (1 - 0.2));
        echo "<hr> $a";
        exit;*/

        $pasien_id  = \Session::get('pasien_id');    
        $periksa_id = \Session::get('periksa_id');        
        $penyakits  = \DB::select("select *from aturans group by penyakit_id");
        $penyakits  = \collect($penyakits);
        foreach ($penyakits as $penyakit) {
            $cf_he = 0;
            $a     = 0;
            $penyakit_id = $penyakit->penyakit_id;
            echo "<h1>$penyakit_id</h1>";
            $diagnosa    = \App\Hitung::wherePasienId($pasien_id)
                                      ->wherePeriksaId($periksa_id)
                                      ->wherePenyakitId($penyakit_id)->get();
            foreach ($diagnosa as $v) {
                $cf_combine = $v->cf_he;
                $gejala_id  = $v->gejala_id;
                $aturan     = \App\Aturan::whereGejalaId($gejala_id)
                                           ->wherePenyakitId($penyakit_id)
                                           ->first();
                $cf2        = $v->jawaban;            
                
                echo "Gejala $gejala_id : Penyakit $penyakit_id <br>";
                //echo "$cf_he = $cf_he+$v->cf_he * (1 - $cf_he)<br>";
                //$cf_he = $cf_he+($v->cf_he * (1 - $cf_he));
                echo "$cf_he  = $cf_he+$v->cf_he * (1 - $cf_he)<br>";
                $cf_he2       = $v->cf_he * (1 - $cf_he);                
                echo "$cf_he  = $cf_he+$cf_he2 <br>";
                $cf_he        = $cf_he+$cf_he2;
            } 
            $presentase = $cf_he*100;
            echo "$presentase";  
            echo "<hr />";
            $hitungPersen = new \App\HitungPersen();
            $hitungPersen->pasien_id   = $pasien_id;
            $hitungPersen->penyakit_id = $penyakit_id;
            $hitungPersen->persen      = $presentase;
            $hitungPersen->periksa_id  = $periksa_id;
            $hitungPersen->save();
        }
        return redirect('sistemPakar/index_hasil');
    }

    public function indexHasil(){
    $pasien_id  = \Session::get('pasien_id');
    $periksa_id = \Session::get('periksa_id');
    $hasil      = \App\HitungPersen::orderBy('persen','desc')
                                    ->wherePasienId($pasien_id)
                                    ->wherePeriksaId($periksa_id)
                                    ->take(1)->first();
    $hasilchart = \App\HitungPersen::wherePasienId($pasien_id)
                                    ->wherePeriksaId($periksa_id)
                                    ->get();
    $data['hasil']      = $hasil;
    $data['hasilchart'] = $hasilchart;
    //dd($hasil);
    return view('frontend/sistemPakarHasil',$data);
    }

    public function pdf(){
    $pasien_id  = \Session::get('pasien_id');
    $periksa_id = \Session::get('periksa_id');
    $hasil      = \App\HitungPersen::orderBy('persen','desc')
                                    ->wherePasienId($pasien_id)
                                    ->wherePeriksaId($periksa_id)
                                    ->take(1)->first();
    $hasilchart = \App\HitungPersen::wherePasienId($pasien_id)
                                    ->wherePeriksaId($periksa_id)
                                    ->get();
    $data['hasil']      = $hasil;
    $data['hasilchart'] = $hasilchart;
    $pdf = \PDF::loadView('frontend/diagnosaPdf', $data);
    return $pdf->stream('diagnosa.pdf');
    }
}