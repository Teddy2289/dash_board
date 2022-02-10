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
        // 1. La validation
        $this->validate($request, [
            "name" => 'bail|required|string|max:255',
            "email" => 'bail|required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            "gender" => 'bail|required',
            "nationality" => 'bail|required',
        ]);

        // 2. On upload l'image dans "/storage/app/public/posts"

        $name = $request->file('image')->getClientOriginalName();

        $path = $request->file('image')->store('public/posts');

        // 3. On enregistre les informations du Post
        User:create([
            "name" => $request->name,
            "email" => $request->email,
            "image" => $chemin_image,
            "gender" => $request->gender,
            "nationality" => $request->nationality,
        ]);

        // 4. On retourne vers tous les posts : route("posts.index")
        return redirect(route("user"));
    }
}
