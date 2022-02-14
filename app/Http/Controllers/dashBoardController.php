<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class dashBoardController extends Controller
{
    public function user()
    {
        $user = User::all();
        return view('admin.user.index',compact('user',$user));
    }
    public function edit_user(Request $request, $id){
        $user = User::findOrFail($id);
        return view('admin.user.edit_user', compact('user',$user));

    }

    public function list_user()
    {
        $user = User::all();
        return view('admin.user.list',compact('user'));
    }


    public function update_user(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin');
        $user->update();
        return redirect('/user')->with('status','Update successfuly');
    }
    public function delete_users($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('status','are you sur to delete this users !?');
    }

    public function create(Request $request) {
        $user = new  User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->nationality = $request->input('nationality');
        $user->password = $request->input('password');
   $user->save();
        return redirect(route("user"));
    }
}
