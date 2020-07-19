<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembobotanAlternatif extends Model
{
    protected $table = 'pembobotan_alternatif';

  public $timestamps = false;

  protected $fillable = [
    'id', "alternatif_id", "id_kriteria", "nilai"
  ];

  public function Kriteria1(){
    return $this->belongsTo('App\spkkriteria', 'id_kriteria_1', 'id');
  }

  public function Kriteria2(){
    return $this->belongsTo('App\spkkriteria', 'id_kriteria_2', 'id');
  }
}
