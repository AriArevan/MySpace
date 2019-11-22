<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
use File;
use Redirect;
class UserController extends Controller
{

    public function index()
    {
        $users = User::get();   

        return view('users.profile')
        ->with('users', $users);
    }


    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('users.profile')->with('user', $user);
    }
    

    public function update_image(Request $request){
        $user = User::find(Auth::user()->id);

        if($request->hasFile('image')){
          $image = $request->file('image');
          $filename = time() . '.' . strtolower($image->getClientOriginalExtension());
          if ($user->image !== 'default.jpg') {
            $file = public_path('uploads/images/' . $user->image);

            if (File::exists($file)) {
                unlink($file);
            }

        }

        Image::make($image)->fit(300, 300, function ($constraint) {
            $constraint->upsize();
        })->save( public_path('/uploads/images/' . $filename));

        $user = Auth::user();
        $user->image = $filename;
        $user->save();
    }

    return Redirect::back();
}


    public function edit(User $user, $id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user = User::findorFail(Auth::id());
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->address = $request->address;
        $user->zipcode = $request->zipcode;
        $user->relation_status = $request->relation_status;
        $user->email = $request->email;



        $user->save();

        return Redirect::back();
    }

    public function store(Request $request){

    }


}
