<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;
use App\Sermina;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $infors = DB::table('information')->orderBy('date','desc')->simplePaginate(6);
        $ranks = Information::withCount('students')->orderBy('students_count','desc')->limit(1)->get();
        $lists = Information::has('students')->withCount('students')->orderBy('students_count','desc')->get();
        return view('page.index', compact('infors','ranks','lists'));

    }


}
