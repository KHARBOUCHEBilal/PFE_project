<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function show_chef_login (){
        return view('auth.login_chef');
    }

    // public function studentAuth(Request $request)
    // {
    //     // return $request;
    //     $credentials = $request->validate([
    //         'CNE' => ['required', 'max:10', 'min:10'],
    //         'CNI' => ['required', 'max:10', 'min:5'],
    //         'studentCode' => ['required', 'date'],
    //     ]);
     
    //     $user = User::where('CNE', $request->CNE)->where('CNI', $request->CNI)->where('studentCode', $request->studentCode)->first();
    //     if ($user) {

    //         $this->guard()->login($user);
    //         $token = $user->createToken('auth_token')->plainTextToken;
            
    //         return $this->registered($request, $user)
    //             ?: redirect($this->redirectPath());
                
    //         // $new_request = new Request(['_token' => $request->_token, 'email' => $user->email, 'password' => $user->password]);
    //         // Auth::attempt(['email'=>$user->email, 'password'=>$user->password, 'CNE'=>$request->CNE, 'CNI'=> $user->CNI]);
    //         // $new_request->session()->regenerate();
    //         // return Auth::user();
    //         // if ($this->attemptLogin($new_request)) {
    //         //     if ($new_request->hasSession()) {
    //         //         $new_request->session()->put('auth.password_confirmed_at', time());
    //         //     }
    //         //     if ($response = $this->authenticated($new_request, $this->guard()->user())) {
    //         //         return $response;
    //         //     }
    //         // }
    //     }
    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('email');
    // }
}
