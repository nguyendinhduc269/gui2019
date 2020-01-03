<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use App\Information;
use Illuminate\Database\Eloquent\Builder;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
	use UploadTrait;

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$infors = Information::whereHas('students', function (Builder $query) {
			$query->where('students_id', '=', Auth::user()->id);
		})->get();
		$ranks = Information::withCount('students')
	      ->orderBy('students_count', 'desc')->limit(1)->get();
	    $lists = Information::has('students')->withCount('students')->orderBy('students_count','desc')->get();

		return view('page.profile',compact('infors','ranks','lists'));
	}

	public function cancelmoshikomi(Request $request)
    {
        $infor = Information::find( $request->get('infor_id'));

        $infor->students()->detach($request->get('student_id'));

    return redirect()->back()->with('success', '削除しました！');
    }

	public function updateProfile(Request $request)
	{
        // Form validation
		$request->validate([
			'name'        =>  'required',
			//'picture'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
			'current_password' => ['required', new MatchOldPassword],
			'new_password' => ['required'],
			'new_confirm_password' => ['same:new_password'],
		]);

        // Get current user
		$user = User::findOrFail(auth()->user()->id);
        // Set user name
		$user->name = $request->input('name');

        // Check if a profile image has been uploaded
		if ($request->has('picture')) {
            // Get image file
			$image = $request->file('picture');
            // Make a image name based on user name and current timestamp
			$name = str_slug($request->input('name')).'_'.time();
            // Define folder path
			$folder = '/uploads/images/user/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
			$filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
			$this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
			$user->picture = $filePath;
		}

    User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

		$user->save();

		return redirect()->back()->with('success','会員情報更新しました！');
	}
}
