<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KecelakaanController extends Controller
{
    public function index(){
		return view('laka.index');
	}

	public function jKendaraan(){
		return view('laka.jeniskendaraan');
	}

	public function jTabrakan(){
		return view('laka.jenistabrakan');
	}

	public function Kkorban(){
		return view('laka.kondisikorban');
	}
}