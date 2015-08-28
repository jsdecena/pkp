<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Input;
use Redirect;
use Auth;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.users.list', array('users' => User::paginate(10) ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8'
        ]);

        $user           = new User;
        $user->name     = Input::get('name');
        $user->email    = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();

        return Redirect::route('admin.users.index')->with('success', 'Successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin.users.profile', array('user' => User::findOrFail($id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.users.edit', array('user' => User::findOrFail($id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::find($id);
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        if (Input::has('password')) {
            $user->password = Hash::make(Input::get('password'));
        }
        $user->save();

        //check if editing your own profile
        if (Auth::id() == $id) {
            
            Auth::logout();
            return Redirect::to('auth/login')->with('success', 'You have been logged out to the application.');
        }        

        return Redirect::route('admin.users.edit', $id)->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        //check if editing your own profile
        if (Auth::id() == $id) {
            
            Auth::logout();
            return Redirect::to('auth/login')->with('success', 'You have been logged out to the application.');
        }        

        return Redirect::route('admin.users.index')->with('success', 'You have successfully deleted a user.');
    }
}
