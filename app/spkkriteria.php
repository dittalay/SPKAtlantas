<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spkkriteria extends Model
{
    protected $guarded = [
        'id','created_at','upadated_at'];

    protected $table = 'kriteria_ahp';  //ambil table jadi tinggal manggil model aja crudnya nanti

    protected $fillable = ['kriteria'];

    public function NilaiKriteria1(){
        return $this->hasMany('App\NilaiKriteria', 'id_kriteria_1', 'id');
      }

      public function NilaiKriteria2(){
        return $this->hasMany('App\NilaiKriteria', 'id_kriteria_2', 'id');
      }

      public function NilaiNormalisasi1(){
        return $this->hasMany('App\NormalisasiKriteria', 'id_kriteria_1', 'id');
      }
      public function NilaiNormalisasi2(){
        return $this->hasMany('App\NormalisasiKriteria', 'id_kriteria_2', 'id');
      }

      public function SkorNormalisasiKriteria(){
        return $this->hasOne('App\SkorNormalisasiKriteria', 'id_kriteria', 'id');
      }

      public function TotalNormalisasiKriteria(){
        return $this->hasOne('App\TotalNormalisasiKriteria', 'id_kriteria', 'id');
      }
}
