<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NormalisasiKriteria extends Model
{
    protected $table = 'normalisasi_kriteria';

    public $timestamps = false;

    protected $fillable = [
      'id', 'id_kriteria_1', 'id_kriteria_2', 'nilai'
    ];

    public function Kriteria1(){
      return $this->belongsTo('App\spkkriteria', 'id_kriteria_1', 'id');
    }

    public function Kriteria2(){
      return $this->belongsTo('App\skpkkriteria', 'id_kriteria_2', 'id');
    }
}
