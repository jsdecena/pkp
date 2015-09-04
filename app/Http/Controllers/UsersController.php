<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.users.list', array('data' => User::paginate(10) ));
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
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Successfully created!');
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

        $user           = User::find($id);
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        
        //COVER PHOTO
        $fileName = uniqid() . '.' . $request->file('file')->getClientOriginalExtension();
        $request->file('file')->move("uploads", "$fileName");

        $user->cover    = $fileName;
        $user->save();

        //check if editing your own profile
        if (Auth::id() == $id) {
            if ($request->has('password')) {
                Auth::logout();
                return redirect('auth/login')->with('success', 'You have been logged out to the application.');
            }
        }        

        return redirect()->route('admin.users.edit', $id)->with('success', 'Successfully updated');
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
            return redirect('auth/login')->with('success', 'You have been logged out to the application.');
        }        

        return redirect()->route('admin.users.index')->with('success', 'You have successfully deleted a user.');
    }
}
