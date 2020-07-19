<?php

namespace App\Http\Controllers;


use App\Alternatif;
use App\spkkriteria;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NilaiAlternatifController extends Controller
{
    public function nilaialt(){
		return view('spk.alternatif.nilaialternatif');
    }

    public function index(){
        $idUser = Auth::id();
      $alternatif = Alternatif::with(['NilaiAlternatif' => function($q){
        $q->orderBy('id_kriteria', 'ASC');
      }])->get();
      $kriteria = spkkriteria::where('id_user', $idUser)->orderBy('id', 'ASC')->get();
      // return response()->json($alternatif);
      return view('spk.alternatif.nilaialternatif', compact('alternatif', 'kriteria'));
    }
}
