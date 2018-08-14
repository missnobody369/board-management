<?php

namespace App\Http\Controllers;

use Session;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct() {
        // Chain the admin middleware
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return view of all users of the application
        return view('admin.users.index')->with('users', User::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Returning a view to create a new user
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        //Create a User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password') // Default password for all users
        ]);

        //Create Profile
        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/avatar.jpg' // Adding default image
        ]);

        Session::flash('success', 'User has been created successfully!.');

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        // Delete profile than delete the user
        $user->profile->delete();
        $user->delete();

        Session::flash('success', 'User has been successfully deleted!');

        return redirect()->back();

    }

    // For admin method
    public function admin($id) {
        $user = User::find($id);

        $user->admin=1;
        $user->save();

        Session::flash('success', 'Successfully change user permission.');

        return redirect()->back();
    }

    // For Not Admin method
    public function not_admin($id) {
        $user = User::find($id);

        $user->admin=0;
        $user->save();

        Session::flash('success', 'Successfully change user permission.');

        return redirect()->back();
    }
}
