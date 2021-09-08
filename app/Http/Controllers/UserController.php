<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone_number' => 'required|unique:users,phone_number|min:11|max:11', 
            'password' => 'required'
        ]);
        
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()
        ->route('user.index')
        ->with('message', "user $user->name create successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::findorfail($id);
        return view('users.show')->with(compact('user'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::findorfail($id);
        return view('users.edit')->with(compact('user'));
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

        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id, /* check email is unique except this $id */
            'phone_number' => 'required|min:11|max:11', 
            'current_password' => 'current_password',
            'password' => 'confirmed'
        ]);
        /* use this for that when we dont want change password put the exist password in database  */
        if ($request->password) {
            $password = $request->password;
        }else{
            $password = $validator['current_password'];
        }
        
        DB::table('users')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($password)
        ]);

        return redirect()
        ->route('user.index')
        ->with('message', "user $request->name update successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $name = user::find($id)->name;
        DB::table('users')->where('id', $id)->delete();

        return redirect()
        ->route('user.index')
        ->with('message',"user $name delete successfully!");
    }
}
