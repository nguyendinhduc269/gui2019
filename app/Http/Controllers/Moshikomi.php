<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Information;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

class Moshikomi extends Controller
{
    //
    public function getmoshikomi(Request $request)
    {
        $infor = Information::find( $request->get('infor_id'));

    
    if ( $infor->students()->exists()) {
             # code...
        foreach ($infor->students as $student) {
                # code...
            if($student->id == $request->get('student_id'))
            {
                return redirect('/')->with('danger', '失敗しました！　この説明会は申し込みしています！');
            }
        }  
    }
    if ($infor->date < Carbon::now()) {
        # code...
        return redirect('/')->with('danger', '失敗しました！　この説明会はすぎしています！');

    }
    $infor->students()->attach($request->get('student_id'));

    return redirect('/')->with('success', '追加完成した！');

    }

    

     

}
