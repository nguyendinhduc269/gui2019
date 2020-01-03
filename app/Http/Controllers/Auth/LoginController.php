<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Information;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    const EMAIL_REGEX = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';
    const STUDENT_CODE_REGEX = '/([1-9]0?)[0-9](TE|te|ad|AD)\B[0-9]+[1-9]/m';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $ranks = Information::withCount('students')->orderBy('students_count','desc')->limit(1)->get();
        $lists = Information::has('students')->withCount('students')->orderBy('students_count','desc')->get();
        return view('auth.login',compact('ranks','lists'));
    }

    public function username()
{
     $login = request()->input('username');

     $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'student_code';
     request()->merge([$field => $login]);

     return $field;
}

    protected function credentials(Request $request)
    {
        $username = $request->get($this->username(), '');
        $usernameField = 'email';
        preg_match(self::EMAIL_REGEX, $username, $matches);
        // Nếu không phải địa chỉ email thì sẽ có thể là số điện thoại
        if (empty($matches)) {
            $usernameField = 'student_code';
            $username = $this->validateStudentCode($username);
        }

        return [
            $usernameField => $username,
            'password' => $request->get('password'),
        ];
    }

    protected function validateStudentCode($username)
    {
        preg_match(self::STUDENT_CODE_REGEX, $username, $matches);

        if ($username) {
            return $username;
        }

        // nếu không phải số điện thoại thì trả về thông báo lỗi
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    // public function authenticate(Request $request){
    //     $request->validate([
    //         'password' => 'required', 
    //         'student_code' =>'required',
    //     ]);

    //     $credentials = $request->only('student_code', 'password');

    //     if(Auth::attempt($credentials,$request->has('remember'))){
    //         return redirect()->intended('/');
    //     }

    //     if(Auth::viaRemember()){
    //         return redirect()->intended('/');
    //     }
    //     return $this->sendFailedLoginResponse($request);

    // }



    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'loginerr' => [trans('auth.failed')],
        ]);
        

    }

}