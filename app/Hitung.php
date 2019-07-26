<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hitung extends Model
{
    protected $guarded =[];
    public $timestamps = false;
    public function gejala()
    {
    	return $this->belongsTo('\App\Gejala');
    }
}
