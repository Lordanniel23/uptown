<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    // public function login(Request $request){
        // dd($request);
    // }
    public function redirectTo(){
        if (Auth::check() ){
            if (Auth::user()->status_id != 3) {
                if (Auth::user()->status_id == 1){
                    return('/newuser');
                }
                if (Auth::user()->role_id == 1) {
                    // dd('admin');
                    return('/admin');
                }
                elseif (Auth::user()->role_id == 2) {
                    // dd('cashier');
                    return('/cashier');
                }
                elseif (Auth::user()->role_id == 3) {
                    // dd('waiter');
                    return('/waiter');
                }
                elseif (Auth::user()->role_id == 4) {
                    // dd('kitchen');
                    return('/kitchen');
                }
                else {
                    dd('logincontroller');
                    return('/asdsd');
                }
            }else{
        toastr()->error('Contact System Administrator!','ACCOUNT SUSPENDED!');        
            }
        }   
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (!Auth::check())
        {
           return redirect()->to('/logincontroller');
        }
    }
    public function username()
    {
        return 'username';
    }
    protected function authenticated()
{
    \Auth::logoutOtherDevices(request('password'));
}


}
