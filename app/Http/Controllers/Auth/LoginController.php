<?php

namespace patio\Http\Controllers\Auth;

use patio\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Guard;
use patio\User;
use DB;

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

    protected $auth;
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'master';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
	$this->auth = $auth;
        $this->middleware('guest')->except('logout');
    }
	
    public function redirectPath()
    {
        if ($this->auth->check()) {
            switch(auth()->user()->CodGrupo){
                case '1':
                    #Cliente
                    return 'pagina_menu';
                    break;
                case '2':
                    #Repartidor //no se toma en cuenta
                    return 'Repartidor';
                    break;
                case '3':
                    #Despachador //misma pagina_web con otra vista
                   return 'PaginaDespachador';
                    break;
                case '4':
                    #SuperAdmin
                    return 'SuperAdmin';
                    break;
                case '5':
                    #Admin
                    return 'Admin';
                    break;
                default:
                    return $redirectTo ='/';
                    break;
            }
        }
    }
    
    public function username(){
        return 'username';
    }
    
}
