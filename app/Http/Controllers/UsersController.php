<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\Requests;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//
use App\User;
use Input;
use Redirect;

class UsersController extends Controller
{

	protected $rules = [
		'email' => ['required'],
		'password' => ['required'],
	];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('users.index');
		$users = User::all();
		return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, $this->rules);
        $input = Input::all();
	User::create( $input );
 
	return Redirect::route('users.index')->with('message', 'User created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
		if($user->role=='normal')
			return view('users.show', compact('user'));
		else
		{
			$user=User::all();
			return view('admin.show', compact('user'));
		}
	
	
        //return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Request $request)
    {
		$this->validate($request, $this->rules);
        $input = array_except(Input::all(), '_method');
	$user->update($input);
 
	return Redirect::route('users.show', $user->id)->with('message', 'User updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
 
	return Redirect::route('users.index')->with('message', 'User deleted.');
    }
}
