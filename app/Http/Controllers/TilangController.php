<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GoogleMaps;

class TilangController extends Controller
{
    public function index(){
		return view('tilang.index');
    }

    public function map(){
        $response = GoogleMaps::load('geocoding')
                ->setParamByKey('address', 'santa cruz')
                ->setParamByKey('components.administrative_area', 'TX')
                 ->get();

                 echo json_encode($response);
    }
}
