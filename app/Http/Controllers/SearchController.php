<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function searchname(Request $request){
    	$q = $request->get('search');
    	$infors = Information::where('company_name','LIKE','%'.$q.'%')->paginate(8);
	    $ranks = Information::withCount('students')
	      ->orderBy('students_count', 'desc')->limit(1)->get();
	    $lists = Information::has('students')->withCount('students')->orderBy('students_count','desc')->get();

    	return view('page.search',compact('infors','ranks','lists'));
    }
}
