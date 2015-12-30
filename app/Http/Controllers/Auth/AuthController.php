<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\Auth\LoginRequest; 
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
	protected $user; 
	protected $auth;
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
	//protected $redirectPath = 'users/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth, User $user)
    {
		$this->user = $user; 
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
			//'role' => 'normal',
        ]);
    }
	
	
	/* Login get post methods */
    public function getLogin() {
        return View('auth.login');
    }

    public function postLogin(LoginRequest $request) {
       if ($this->auth->attempt($request->only('email', 'password')))
        {
            return redirect('/users/'.$request->user()->id);
        }

        return redirect('/auth/login')->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    /* Register get post methods */
    public function getRegister() {
        return View('auth.register');
    }

    public function postRegister(RegisterRequest $request) {
        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->password = bcrypt($request->password);
        $this->user->save();
        return redirect('auth/login');
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function getLogout()
    {
        $this->auth->logout();
        return redirect('auth/login');
    }
}
