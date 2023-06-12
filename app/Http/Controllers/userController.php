<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class userController extends Controller
{
    function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            echo '<script>alert("Username or Password is not matched");</script>';
            return redirect()->back();
        }
        elseif($req->email === 'mmk@admin.com' && $req->password === 'admin'){
            return redirect('/admin');
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
