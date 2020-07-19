<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Ranking;
use App\spkkriteria;
use App\CekKonsistensi;
use App\Alternatif;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index()
    {
        $idUser = Auth::id();
        $properties = Alternatif::join('ranking', 'properties.id', '=', 'ranking.property_id')->orderBy('ranking.nilai', 'DESC')->get();
        $konsistensi = spkkriteria::join('konsistensi_kriteria', 'kriteria_ahp.id', '=', 'konsistensi_kriteria.id_kriteria')->orderBy('kriteria_ahp.id', 'ASC')->get();
        $cekKonsistensi = CekKonsistensi::where('id_user', $idUser)->first();
        return view('admin.ranking.index', compact('properties','konsistensi','cekKonsistensi'));
      }
  }
