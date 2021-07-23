<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\slider;

class ContentController extends Controller
{
    public function getHome(){
    	$slider = slider::where('visible', 1)->orderBy('orden', 'asc')->get();
    	$data = ['slider' => $slider];
    	return view('Home', $data);
    }
}
