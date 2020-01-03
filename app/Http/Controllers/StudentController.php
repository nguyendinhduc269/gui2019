<?php

namespace App\Http\Controllers;

use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Sermina;

class StudentController extends Controller
{

    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $serminas = Sermina::all();


        $students = new User;

        $queries = [];

        $columns = [
            'seminar_room',
        ];

    foreach ($columns as $column) {
        if($request->has($column)){
            $students = $students->where($column, $request->get($column));
            $queries[$column] = $request->get($column);
        }
    }

    if ($request->has('sort')) {
        $students = $students->orderBy('grade',$request->get('sort'));
        $queries['sort'] = request('sort');
    }

    $students = $students->paginate(4)->appends($queries);

        return view('admin.student.index', compact('students','serminas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $students = new User([
            'student_code' =>  $request->get('student_code'),
            'name' => $request->get('name'),
            'password' => hash::make($request->get('password')),
            // 'picture' => $request->get('picture'),
            'email' => $request->get('email'),
            'serminar_room' => $request->get('serminar_room'),
            'grade' => $request->get('grade'),
            'resume' => $request->get('resume'),
            'isAdmin' => $request->get('isAdmin'),
            'picture' => '/Template/Gui2019/img/user.jpg',

        ]);
        $students->save();
        return redirect('/admin/student')->with('success', '追加完成した！');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = User::find($id);
        $sermina = Sermina::all();

        return view('admin.student.edit', compact('sermina','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $student = User::find($id);
        $student->student_code =  $request->get('student_code');
        $student->name = $request->get('name');
        $student->password =  hash::make($request->get('password'));
        $student->email = $request->get('email');
        $student->seminar_room =  $request->get('seminar_room');
        $student->grade = $request->get('grade');
        $student->resume = $request->get('resume');
        $student->isAdmin =  $request->get('isAdmin');
       // $student->picture = '/Template/Gui2019/img/user.jpg';

        $student->save();

        return redirect('/admin/student')->with('success', '更新した！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $student = User::find($id);
       $student->delete();

       return redirect('/admin/student')->with('success', '削除しました!');
   }

   

}
