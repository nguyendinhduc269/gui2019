<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Traits\UploadTrait;
use App\Imports\ImportCSV;
//use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UploadCSV;

class InforController extends Controller
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
        $infors = new Information;

        $queries = [];

        $columns = [
            'recruited_occupation',
        ];

        foreach ($columns as $column) {
            if($request->has($column)){
                $infors = $infors->where($column, $request->get($column));
                $queries[$column] = $request->get($column);
            }
        }

        if ($request->has('sort')) {
            $infors = $infors->orderBy('date',$request->get('sort'));
            $queries['sort'] = request('sort');
        }

        $infors = $infors->paginate(8)->appends($queries);

        return view('admin.infor.index', compact('infors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.infor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'company_name'=>'required',
            'locationInfo'=>'required',
            'date'=>'required'
         ]);
         
         if(Information::where('company_name',$request->get('company_name'))!=NULL){
            $infors = Information::where('company_name',$request->get('company_name'))->get();
            foreach($infors as $temp){
                if($temp->date == $request->get('date') && $temp->location_info == $request->get('locationInfo'))
                {
                    return back()->with('danger', 'この説明会が存在します');

                }
                $logo = $temp->logo ;
            }    
        }

        $infor = new Information([
            'company_name' =>  $request->get('company_name'),
            'location_info' => $request->get('locationInfo'),
            'date' => $request->get('date'),
            'recruited_occupation' => $request->get('recruited_occupation'),
            'written_test' => $request->get('written_test'),
            'written_test_content' => $request->get('written_test_content'),
            'interview' => $request->get('interview'),
            'industry' => $request->get('industry'),
            'qualification' => $request->get('qualification'),
            'country' => $request->get('country'),
            'age_limit' => $request->get('age_limit'),
            'grade' => $request->get('grade'),
            'graduate' => $request->get('graduate'),
            'part_time_job' => $request->get('part_time_job'),
            'intership' => $request->get('intership'),
            'condidate' => $request->get('condidate'),
            'url' => $request->get('url'),
            'logo' => $logo,
            
        
        ]);
        $infor->save();
        return back()->with('success', '追加完成した！');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\infor  $infor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infor = Information::find($id);
        return view('admin.infor.show',compact('infor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\infor  $infor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $infor = Information::find($id);
        return view('admin.infor.edit', compact('infor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\infor  $infor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $request->validate([
           'company_name'=>'required',
           'locationInfo'=>'required',
           'date'=>'required'
       ]);

       $infor = Information::find($id);
       $infor->company_name =  $request->get('company_name');
       $infor->location_info = $request->get('locationInfo');
       $infor->date = $request->get('date');
       $infor->recruited_occupation = $request->get('recruited_occupation');
       $infor->written_test = $request->get('written_test');
       $infor->written_test_content = $request->get('written_test_content');
       $infor->interview = $request->get('interview');
       $infor->industry = $request->get('industry');
       $infor->qualification = $request->get('qualification');
       $infor->country = $request->get('country');
       $infor->age_limit = $request->get('age_limit');
       $infor->grade = $request->get('grade');
       $infor->graduate = $request->get('graduate');
       $infor->part_time_job = $request->get('part_time_job');
       $infor->intership = $request->get('intership');
       $infor->condidate = $request->get('condidate');
       $infor->url = $request->get('url');
        // Check if a logo image has been uploaded
       if ($request->has('logo')) 
       {
            // Get image file
            $image = $request->file('logo');
                // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('company_name')).'_'.time();
                // Define folder path
            $folder = '/uploads/images/logo/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
                // Set user profile image path in database to filePath
            $infor->logo = $filePath;
       }
        $infor->save();

        return redirect('/admin/infor')->with('success', '更新した！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\infor  $infor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $infor = Information::find($id);
        $infor->delete();

        return redirect('/admin/infor')->with('success', '削除しました!');
    }

    // Import CSV

    public function import(UploadCSV $request)
    {
        //Excel::import
        (new ImportCSV)->import(request()->file('fileCSV'));
        
        return back()->with('success', 'データをインポート完了！');
    }
}
