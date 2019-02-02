<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    protected $guarded=[];
    public function gejala(){
    	return $this->belongsTo('\App\Gejala')->withDefault();
    }
    public function penyakit(){
    	return $this->belongsTo('\App\Penyakit')->withDefault();
    }
}
