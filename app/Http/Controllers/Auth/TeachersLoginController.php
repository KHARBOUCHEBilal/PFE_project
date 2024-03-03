<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginteacherRequest;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class TeachersLoginController extends Controller
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

    use RegistersUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function show_teacher_login()
    {
        return view('auth.login_teacher');
    }

    public function teacherAuth(LoginTeacherRequest $request)
    {
        $t_starts_at = Setting::where('id', 1)->get()->first()->starts_at_teachers;
        $t_ends_at = Setting::where('id', 1)->get()->first()->ends_at_teachers;
        $teachers_status = Setting::where('id', 1)->get()->first()->is_teachers_active;

        if ($teachers_status!='0') {
            if (($t_starts_at < now() & $t_ends_at > now()) || $teachers_status=="1") {
                
                $user = User::where('email', $request->email)
                ->where('password', Hash::make($request->password))
                ->where('user_type', 'teacher')->get()->first();

                return Hash::make($request->password);

                if ($user) {
                    Auth::login($user);
                    return $this->authenticated($request, $user);
                }
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');
            } else {
                return redirect()->route('show_teacher_login')->with(['error' => __("You can't login it's not the time of set The subjects")]);
            }
        } else {
            return redirect()->route('show_teacher_login')->with(['error' => __("You can't login it's not the time of set The subjects")]);
        }
    }
}
