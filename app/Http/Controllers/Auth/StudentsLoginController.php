<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginStudentRequest;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class StudentsLoginController extends Controller
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



    public function show_student_login()
    {
        return view('auth.login_student');
    }


    public function studentAuth(LoginStudentRequest $request)
    {
        $s_starts_at = Setting::where('id', 1)->get()->first()->starts_at_students;
        $s_ends_at = Setting::where('id', 1)->get()->first()->ends_at_students;
        $students_status = Setting::where('id', 1)->get()->first()->is_students_active;
        if ($students_status == '1') {
            if (($s_starts_at < now() & $s_ends_at > now()) || $students_status) {
                $user = User::where('CNE', $request->CNE)->where('CNI', $request->CNI)->where('studentCode', $request->studentCode)->where('user_type', 'student')->first();
                if ($user) {

                    $this->guard()->login($user);

                    return $this->registered($request, $user)
                        ?: redirect('/');
                }
                return back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');
            } else {
                return redirect()->route('show_student_login')->with(['error' => __("You can't login it's not the time of choising PFE")]);
            }
        } else {
            return redirect()->route('show_student_login')->with(['error' => __("You can't login it's not the time of choising PFE")]);
        }
    }
}
