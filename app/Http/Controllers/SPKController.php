<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\spkkriteria;
use App\Alternatif;
use App\CekKonsistensi;
use App\NilaiKriteria;
use App\NilaiAlternatif;
use App\Ranking;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class SPKController extends Controller
{
    protected $idUser;
    public function __construct(Guard $auth){
        $this->idUser = $auth->id();
    }

    public function spkresult(){
		$idUser = Auth::id();
        $alternatif = Alternatif::join('ranking', 'tabel_alternatif.id', '=', 'ranking.alternatif_id')->orderBy('ranking.nilai', 'DESC')->get();

        $konsistensi = spkkriteria::join('konsistensi_kriteria', 'kriteria_ahp.id', '=', 'konsistensi_kriteria.id_kriteria')->orderBy('kriteria_ahp.id', 'ASC')->get();

        $cekKonsistensi = CekKonsistensi::where('id_user', $idUser)->first();
        return view('spk.result', compact('alternatif', 'cekKonsistensi', 'konsistensi'));
      }

	public function spkalternatif() {
        $alternatif = Alternatif::all();
        return view('spk.alternatif.index', ['alternatif' => $alternatif]);
    }

    // Charts
    public function dashboard(){
        $idUser = Auth::id();
		return view('spk.index');
    }

    public function charts(){
        $alternatif = Alternatif::join('ranking', 'tabel_alternatif.id', '=', 'ranking.alternatif_id')->orderBy('ranking.nilai', 'DESC')->get();
        return response()->json($alternatif);
    }

    //store kriteria
    public function store(Request $request)
    {
        $this->validate($request,[
    		'kriteria' => 'required'
        ]);

        //insert data ke table

        $new = new spkkriteria();
        $new->id_user = Auth::id();
        $new->kriteria = $request->kriteria;
        $new->save();

        /*spkkriteria::create([
            'kriteria' => $request->kriteria
        ]);*/


        //alihkan halaman ke halaman pegawai
        return redirect('/spk/kriteria');
    }

    //show data kriteria for update
    public function show($id)
    {
        $kriteria = spkkriteria::find($id);
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('spk.kriteria.edit',compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
    		'kriteria' => 'required'
        ]);

        $kriteria = spkkriteria::find($id);
        $kriteria->kriteria = $request->kriteria;
        $kriteria->save();
        return redirect('/spk/kriteria');
    }

    public function delete(Request $req)
    {
        $del = spkkriteria::where('id', $req->id)->delete();
        $del = NilaiKriteria::where('id_kriteria_1', $req->id)->delete();
        $del = NilaiKriteria::where('id_kriteria_2', $req->id)->delete();
        $del = NilaiAlternatif::where('id_kriteria', $req->id)->delete();
        return redirect('/spk/kriteria');
    }

    public function bobotK(){
        $kriteria = spkkriteria::all();
        return view('spk.kriteria.bobot', ['kriteria' => $kriteria]);
    }

    public function maps(){
        $val = Ranking::join('tabel_alternatif AS ta', 'ta.id', 'alternatif_id' )
                    ->orderByDesc('nilai')
                    ->limit(5)
                    ->get();
        return view('spk.maps', compact('val'));
        //echo json_encode($val);
    }

    public function getMap(){
        // echo 'asd'; die();
        $val = Ranking::join('tabel_alternatif AS ta', 'ta.id', 'alternatif_id' )
                        // ->where('alternatif_id', 3)
                        ->get();
        echo json_encode($val);
    }

}
