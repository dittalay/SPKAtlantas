<?php

namespace App\Http\Controllers;

use Auth;
use App\Alternatif;
use App\spkkriteria;
use Illuminate\Http\Request;

class PembobotanAlternatifController extends Controller
{
    public function index()
    {
        $idUser = Auth::id();
        $properties = Alternatif::with(['PembobotanAlternatif' => function($q){
          $q->orderBy('id_kriteria', 'ASC');
        }])->get();
        $kriteria = spkkriteria::where('id_user', $idUser)->orderBy('id', 'ASC')->get();

        return view('admin.bobot-alternatif.index', compact('properties', 'kriteria'));
      }
}
