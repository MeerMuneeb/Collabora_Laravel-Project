<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class userController extends Controller
{
    function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        if($req->email === 'mmk@admin.com' && $req->password === 'admin')
        {
            $req->session()->put('admin',$user);
            return redirect('/admin');
        }
        elseif(!$user || !Hash::check($req->password,$user->password))
        {
            echo '<script>alert("Username or Password is not matched");</script>';
            return redirect()->back();
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }

    function signup(Request $req){
        $user = new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();
        return redirect('/login');
    }
}
