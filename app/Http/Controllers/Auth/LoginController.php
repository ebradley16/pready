<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use User;
use Illuminate\Support\Facades\Log;

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
    
   protected function authenticated(Request $request, $user){

        Log::info('LoginController >> authenticated');

        Log::info('Login User', [ 'user' => $user]);

    //     $managers = Role::('name', 'manager')->first()->users()->get();
    //    if( $user->is_admin){
    //     //return redirect(route('admin.users.index'));

    //     // return redirect(route('landingpageforadmin'));

    //        return redirect ('admin');
    //     }

        if ( $user->hasRole('admin')){
            return redirect ('admin');
        }  
        if ( $user->hasRole('manager')){
            return redirect ('manager');
        } 
         return redirect ('user');
    }

    /**
     * Create a new controller instance.
     *
    * @return void
     */
    /**public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   public function redirectTo()
    {
    if(Auth::user()->hasRole('admin')){

     $this->redirectTo= route('admin.users.index');
     return $this->redirectTo;
   
    }
    $this->redirectTo = route('user');
    return $this->redirectTo;

    }
*/
}
