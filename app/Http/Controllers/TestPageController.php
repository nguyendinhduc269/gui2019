<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;

class TestPageController extends Controller
{
    //
    public function index(){
    	$infors = Information::all();

        return view('page.index', compact('infors'));
    }public function deteail($id){

    }
}
