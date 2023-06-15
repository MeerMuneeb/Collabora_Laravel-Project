<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;


use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class adminController extends Controller
{
    function index(){
        $order = Order::all();
        return view('dashboard', ['orders'=>$order]);
    }

    function categories(){
        $Cdata = Category::all();
        return view('categories', ['category'=>$Cdata]);
    }
    
    function users(){
        $Udata = User::all();
        return view('users', ['users'=>$Udata]);
    }

    function addCategory(Request $req){
        $category = new Category;
        $category->name=$req->name;
        $category->image=$req->image;
        $category->save();
        return redirect('/category');
    }

    function addUser(Request $req){
        $user = new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();
        return redirect('/users');
    }
}
