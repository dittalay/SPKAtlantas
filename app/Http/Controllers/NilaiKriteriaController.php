<?php

namespace App\Http\Controllers;

use App\Ranking;
use App\Alternatif;
use App\spkkriteria;
use App\NilaiKriteria;
use App\CekKonsistensi;
use App\NilaiAlternatif;
use App\KonsistensiKriteria;
use App\NormalisasiKriteria;
use Illuminate\Http\Request;
use App\PembobotanAlternatif;
use App\SkorNormalisasiKriteria;
use App\TotalNormalisasiKriteria;
use Illuminate\Support\Facades\Auth;

class NilaiKriteriaController extends Controller
{
    public function index(){
        $idUser = Auth::id();
        $kriteria = spkkriteria::where('id_user', $idUser)->orderBy('id', 'ASC')->get();
        $nilai = spkkriteria::where('id_user', $idUser)->with(['NilaiKriteria1' => function($q){
          $q->with('Kriteria2')->orderBy('id_kriteria_2', 'ASC');
        }])->orderBy('id', 'ASC')->get();
        // return response()->json($nilai);
        return view('spk.kriteria.index', compact('kriteria', 'nilai'));
      }

      /*public function new(){
        $idUser = Auth::id();
        $kriteria = spkkriteria::all();
        // return response()->json($kriteria[0]['kriteria']);
        return view('user.nilai-kriteria.new', compact('kriteria'));
      }*/

      public function create(Request $req){
        $idUser = Auth::id();
        $kriteria = spkkriteria::all();
        $alternatif = Alternatif::all();

        $ceknol = false;
        for ($l=0; $l < sizeof($kriteria); $l++) {
          for ($r= $l+1; $r < sizeof($kriteria); $r++) {
            if ($req[$kriteria[$l]['id'] . '_' . $kriteria[$r]['id']] == 0 && $req[$kriteria[$r]['id'] . '_' . $kriteria[$l]['id']] == 0){
              $ceknol = true;
              return response()->json(['error' => true, 'message' => 'salah satu pasangan harus diisi']);
            }
          }
        }

        for ($l=0; $l < sizeof($kriteria); $l++) {
            for ($r= $l+1; $r < sizeof($kriteria); $r++) {
              if ($req[$kriteria[$l]['id'] . '_' . $kriteria[$r]['id']] == 0){
                // null
                $cek = NilaiKriteria::where('id_kriteria_1', $kriteria[$l]['id'])->where('id_kriteria_2', $kriteria[$r]['id'])->first();
                if ($cek){
                  $update = NilaiKriteria::where('id', $cek->id)->update([
                    'nilai' => 1 / $req[$kriteria[$r]['id'] . '_' . $kriteria[$l]['id']]
                  ]);
                } else {
                    $new = new NilaiKriteria();
                    $new->id_kriteria_1 = $kriteria[$l]['id'];
                    $new->id_kriteria_2 = $kriteria[$r]['id'];
                    $new->nilai = 1 / $req[$kriteria[$r]['id'] . '_' . $kriteria[$l]['id']];
                    $new->save();
                  }
              } else {
                //ada value
                $cek = NilaiKriteria::where('id_kriteria_1', $kriteria[$l]['id'])->where('id_kriteria_2', $kriteria[$r]['id'])->first();
                if ($cek){
                  $update = NilaiKriteria::where('id', $cek->id)->update([
                    'nilai' => $req[$kriteria[$l]['id'] . '_' . $kriteria[$r]['id']]
                  ]);
                } else {
                  $new = new NilaiKriteria();
                  $new->id_kriteria_1 = $kriteria[$l]['id'];
                  $new->id_kriteria_2 = $kriteria[$r]['id'];
                  $new->nilai = $req[$kriteria[$l]['id'] . '_' . $kriteria[$r]['id']];
                  $new->save();
                }
              }

              if ($req[$kriteria[$r]['id'] . '_' . $kriteria[$l]['id']] == 0){
                //null
                $cek = NilaiKriteria::where('id_kriteria_1', $kriteria[$r]['id'])->where('id_kriteria_2', $kriteria[$l]['id'])->first();
                if ($cek){
                  $update = NilaiKriteria::where('id', $cek->id)->update([
                    'nilai' => 1 / $req[$kriteria[$l]['id'] . '_' . $kriteria[$r]['id']]
                  ]);
                } else {
                  $new = new NilaiKriteria();
                  $new->id_kriteria_1 = $kriteria[$r]['id'];
                  $new->id_kriteria_2 = $kriteria[$l]['id'];
                  $new->nilai = 1 / $req[$kriteria[$l]['id'] . '_' . $kriteria[$r]['id']];
                  $new->save();
                }
            } else {
                    //ada value
                    $cek = NilaiKriteria::where('id_kriteria_1', $kriteria[$r]['id'])->where('id_kriteria_2', $kriteria[$l]['id'])->first();
                    if ($cek){
                      $update = NilaiKriteria::where('id', $cek->id)->update([
                        'nilai' => $req[$kriteria[$r]['id'] . '_' . $kriteria[$l]['id']]
                      ]);
                    } else {
                      $new = new NilaiKriteria();
                      $new->id_kriteria_1 = $kriteria[$r]['id'];
                      $new->id_kriteria_2 = $kriteria[$l]['id'];
                      $new->nilai = $req[$kriteria[$r]['id'] . '_' . $kriteria[$l]['id']];
                      $new->save();
                    }
                  }
                }
              }

              for ($i=0; $i < sizeof($kriteria); $i++) {
                # code...
                $cek = NilaiKriteria::where('id_kriteria_1', $kriteria[$i]['id'])->where('id_kriteria_2', $kriteria[$i]['id'])->first();
                if ($cek){
                  $update = NilaiKriteria::where('id', $cek->id)->update([
                    'nilai' => 1
                  ]);
                } else {
                  $new = new NilaiKriteria();
                  $new->id_kriteria_1 = $kriteria[$i]['id'];
                  $new->id_kriteria_2 = $kriteria[$i]['id'];
                  $new->nilai = 1;
                  $new->save();
                }
              }

              for ($i=0; $i < sizeof($kriteria); $i++) {
                $sum = NilaiKriteria::where('id_kriteria_2', $kriteria[$i]['id'])->sum('nilai');
                // $sum = $sum->sum('nilai');
                // return response()->json($sum);
                for ($j = 0; $j < sizeof($kriteria); $j++) {
                  $nilai = NilaiKriteria::where('id_kriteria_1', $kriteria[$j]['id'])->where('id_kriteria_2', $kriteria[$i]['id'])->first();

                  $cek = NormalisasiKriteria::where('id_kriteria_1', $kriteria[$j]['id'])->where('id_kriteria_2', $kriteria[$i]['id'])->first();
                  if ($cek){
                    $update = NormalisasiKriteria::where('id', $cek->id)->update([
                      'nilai' => $nilai->nilai / $sum
                    ]);
                  } else {
                    $new = new NormalisasiKriteria();
                    $new->id_kriteria_1 = $kriteria[$j]['id'];
                    $new->id_kriteria_2 = $kriteria[$i]['id'];
                    $new->nilai = $nilai->nilai / $sum;
                    $new->save();
                  }
                }

                $total = NormalisasiKriteria::where('id_kriteria_2', $kriteria[$i]['id'])->sum('nilai');

                $cek = TotalNormalisasiKriteria::where('id_kriteria', $kriteria[$i]['id'])->first();
                if ($cek){
                $update = TotalNormalisasiKriteria::where('id', $cek->id)->update([
                    'nilai' => $total
                ]);
                } else {
                $new = new TotalNormalisasiKriteria();
                $new->id_kriteria = $kriteria[$i]['id'];
                $new->nilai = $total;
                $new->save();
                }
            }

            for ($i=0; $i < sizeof($kriteria); $i++) {
                $avg = NormalisasiKriteria::where('id_kriteria_1', $kriteria[$i]['id'])->avg('nilai');

                $cek = SkorNormalisasiKriteria::where('id_kriteria', $kriteria[$i]['id'])->first();
                if ($cek){
                  $update = SkorNormalisasiKriteria::where('id', $cek->id)->update([
                    'skor' => $avg,
                    'persen' => number_format($avg * 100)
                  ]);
                } else {
                  $new = new SkorNormalisasiKriteria();
                  $new->id_kriteria = $kriteria[$i]['id'];
                  $new->skor = $avg;
                  $new->persen = number_format($avg * 100);
                  $new->save();
                }
              }

              $avgKonsistensi = 0;
                for ($i=0; $i < sizeof($kriteria); $i++) {
                $total = 0;
                $per = 0;
                for ($j=0; $j < sizeof($kriteria); $j++) {
                    $nilai = NilaiKriteria::where('id_kriteria_1', $kriteria[$i]['id'])->where('id_kriteria_2', $kriteria[$j]['id'])->first();
                    $skor = SkorNormalisasiKriteria::where('id_kriteria', $kriteria[$j]['id'])->first();
                    $total = $total + ($nilai->nilai * $skor->skor);

                    if ($j == $i){
                        $per = $skor->skor;
                    }
                }

                $total = $total / $per;
                $cek = KonsistensiKriteria::where('id_kriteria', $kriteria[$i]['id'])->first();
                if ($cek){
                $update = KonsistensiKriteria::where('id', $cek->id)->update([
                    'nilai' => $total
                ]);
                } else {
                $new = new KonsistensiKriteria();
                $new->id_kriteria = $kriteria[$i]['id'];
                $new->nilai = $total;
                $new->save();
                }

                $avgKonsistensi = $avgKonsistensi + $total;
            }

            $avgKonsistensi = $avgKonsistensi/sizeof($kriteria);

            $p = sizeof($kriteria);
            $ci = ($avgKonsistensi-$p)/($p-1);
            $ri = 0.58;
            $cr = $ci/$ri;
            $cr_persen = number_format($cr * 100, 2);

            $cek = CekKonsistensi::where('id_user', $idUser)->first();
            if ($cek){
              $update = CekKonsistensi::where('id_user', $idUser)->update([
                'ci' => $ci,
                'ri' => $ri,
                'cr' => $cr,
                'p' => $p,
                'cr_persen' => $cr_persen
              ]);
            } else {
              $new = new CekKonsistensi();
              $new->id_user = $idUser;
              $new->ci = $ci;
              $new->ri = $ri;
              $new->cr = $cr;
              $new->p = $p;
              $new->cr_persen = $cr_persen;
              $new->save();
            }

            for ($i=0; $i < sizeof($kriteria); $i++) {
              $sum = NilaiAlternatif::where('id_kriteria', $kriteria[$i]['id'])->sum('nilai');
              for ($j=0; $j < sizeof($alternatif); $j++) {
                $nilai = NilaiAlternatif::where('id_kriteria', $kriteria[$i]['id'])->where('alternatif_id', $alternatif[$j]['id'])->first();
                $nilai1 = $nilai->nilai / $sum;

                $cek = PembobotanAlternatif::where('id_kriteria', $kriteria[$i]['id'])->where('alternatif_id', $alternatif[$j]['id'])->first();
                if ($cek){
                  $update = PembobotanAlternatif::where('id', $cek->id)->update([
                    'nilai' => $nilai1
                  ]);
                } else {

                /*$new = PembobotanAlternatif::create([
                    'id_kriteria' => $kriteria[$i]['id'],
                    'alternatif_id' => $alternatif[$j]['id'],
                    'nilai' => $nilai1
                ]);*/
                $new = new PembobotanAlternatif();
                $new->id_kriteria = $kriteria[$i]['id'];
                $new->alternatif_id = $alternatif[$j]['id'];
                $new->nilai = $nilai;
                $new->save();
                }
              }
              //dd($new);
            }
            // dd($val);

            for ($i=0; $i < sizeof($alternatif); $i++) {
                $total = 0;
                for ($j=0; $j < sizeof($kriteria); $j++) {
                  $nilai = PembobotanAlternatif::where('id_kriteria', $kriteria[$j]['id'])->where('alternatif_id', $alternatif[$i]['id'])->first();
                  $skor = SkorNormalisasiKriteria::where('id_kriteria', $kriteria[$j]['id'])->first();
                  $total = $total + ($nilai->nilai * $skor->skor);
                }

                $cek = Ranking::where('alternatif_id', $alternatif[$i]['id'])->first();
                if ($cek){
                  $update = Ranking::where('id', $cek->id)->update([
                    'nilai' => $total
                  ]);
                } else {
                    $new = Ranking::create([
                    'alternatif_id' => $alternatif[$i]['id'],
                    'nilai' => $total
                    ]);
                }
              }

              return redirect('/spk/result');
            }

            public function delete(Request $req){
                $del = spkkriteria::where('id', $req->id)->delete();
                $del = NilaiKriteria::where('id_kriteria_1', $req->id)->delete();
                $del = NilaiKriteria::where('id_kriteria_2', $req->id)->delete();
                $del = NilaiKriteria::where('nilai', $req->id)->delete();
                return redirect('/spk/kriteria');
              }
}

