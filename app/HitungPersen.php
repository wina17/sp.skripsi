<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HitungPersen extends Model
{
    protected $guarded =[];
    public $timestamps = false;
    public function pasien(){
    	return $this->belongsTo('\App\Pasien')->withDefault();
    }
    public function penyakit(){
    	return $this->belongsTo('\App\Penyakit')->withDefault();
    }
    public function gejala(){
    	return $this->belongsTo('\App\Gejala')->withDefault();
    }
    public function diagnosa(){
    	return $this->belongsTo('\App\Diagnosa')->withDefault();
    }
}
