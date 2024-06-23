<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function insert_user(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');

        $user = User::insert([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $password
        ]);


//        $userJson = json_encode($user);
//        echo $userJson;
        return redirect()->back()->with('success','Congratulations');
    }

    public function page_function()
    {
        $all = User::all();
        return view('page',['all'=>$all]);
    }

    public function deletefuntion($id)
    {
        $id = User::find($id);
        User::where('id',$id->id)->delete();

        return redirect()->route('welcome');
    }

    public function deletes(Request $request)
    {
        $ids = $request->input('id');

        // Check if $ids is an array to avoid errors
        if (is_array($ids)) {
            User::whereIn('id', $ids)->delete();
        } else {
            // If it's not an array, handle it accordingly
            User::where('id', $ids)->delete();
        }

        return redirect()->route('welcome');
    }


    public function updatepage($id)
    {
        $user = User::find($id);

        return view('update',['id'=>$user]);
    }

    public function updates(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');

         User::where('id',$id)->update([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $password
        ]);

        return redirect()->route('page');
    }
}
