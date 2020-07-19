<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'tabel_alternatif';

    public $timestamps = false;

    protected $fillable = [
        'id', 'lokasi_pelanggaran', 'tanggal',
        'created_at', 'updated_at'
    ];

    public function PembobotanAlternatif()
    {
        return $this->hasMany('App\PembobotanAlternatif', 'alternatif_id', 'id');
    }

    public function Ranking()
    {
        return $this->hasOne('App\Ranking', 'alternatif_id', 'id');
    }
    public function NilaiAlternatif()
    {
        return $this->hasMany('App\NilaiAlternatif', 'alternatif_id', 'id');
    }
}
