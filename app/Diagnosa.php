<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $guarded=[];
    public function gejala(){
    	return $this->belongsTo('\App\Gejala')->withDefault();
    }
}
