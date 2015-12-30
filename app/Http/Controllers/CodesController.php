<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//
use App\Code;
use App\User;
use Input;
use Redirect;

class CodesController extends Controller
{

	protected $rules = [
		'code' => ['required'],
	];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //return view('codes.index');
		return view('codes.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('codes.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
		$this->validate($request, $this->rules);
        $input = Input::all();
	$input['user_id'] = $user->id;
	
	$findme   = 'a3';
	$pos = strstr($input['code'], $findme);
	if($pos == false)
		{	
		Code::create( $input );
		$fd = fopen('blah.php', 'w');
		fwrite($fd, $input['code']);
		fclose($fd);
		return Redirect::to('blah.php');
		}
	else
		{
			return Redirect::route('users.codes.create', $user->id)->with('message', 'Permission Denied. Use of term a3 is not allowed.');
		}
	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Code $code)
    {
        //return view('codes.show', compact('code'));
		return view('codes.show', compact('user', 'code'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Code $code)
    {
        //return view('codes.show', compact('code'));
		return view('codes.edit', compact('user', 'code'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, Code $code, Request $request)
    {
		$this->validate($request, $this->rules);
        $input = array_except(Input::all(), '_method');
	$code->update($input);
	
	$fd = fopen('blah.php', 'w');
	fwrite($fd, $input['code']);
	fclose($fd);
	return Redirect::to('blah.php');
 
	//return Redirect::route('users.codes.show', [$user->id, $code->id])->with('message', 'Code updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Code $code)
    {
        $code->delete();
 
	return Redirect::route('users.show', $user->id)->with('message', 'Code deleted.');
    }
}
