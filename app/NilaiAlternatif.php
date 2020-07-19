<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NilaiAlternatif extends Model
{
    protected $table = 'nilai_alternatif';

    public $timestamps = false;

    protected $fillable = [
      "id", "lokasi", "id_kriteria", 'alternatif_id',
      "from_date", "to_date", "nilai",
      "created_at","updated_at"
    ];

    public function Kriteria(){
      return $this->belongsTo('App\spkkriteria', 'id_kriteria', 'id');
    }
}
