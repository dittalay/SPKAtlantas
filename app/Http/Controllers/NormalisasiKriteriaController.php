<?php

namespace App\Http\Controllers;

use Auth;
use App\spkkriteria;
use App\NormalisasiKriteria;
use App\SkorNormalisasiKriteria;
use App\TotalNormalisasiKriteria;
use Illuminate\Http\Request;

class NormalisasiKriteriaController extends Controller
{
    public function index(){
    $idUser = Auth::id();
    $kriteria = spkkriteria::where('id_user', $idUser)->orderBy('id', 'ASC')->with('TotalNormalisasiKriteria')->get();
    $nilai = spkkriteria::where('id_user', $idUser)->with(['NilaiNormalisasi1' => function($q){
        $q->with('Kriteria2')->orderBy('id_kriteria_2', 'ASC');
    }])->with('SkorNormalisasiKriteria')->orderBy('id', 'ASC')->get();
        // return response()->json($nilai);

    return view('admin.normalisasi.index', compact('kriteria', 'nilai'));
    }
}
