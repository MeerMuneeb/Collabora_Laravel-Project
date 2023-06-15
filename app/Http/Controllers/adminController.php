<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;


use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class adminController extends Controller
{
    function index(){
        $order = Order::all();
        return view('dashboard');
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

    function editUser(Request $req){
        $user = User::find($req->Uid);
        $user->name=$req->name;
        $user->email=$req->email;
        if (!empty($req->password)) {
            $user->password = Hash::make($req->password);
        }
        $user->save();
        return redirect('/users');
    }

    function deleteUser(Request $req){
        $user = User::find($req->Uid);
        if ($user) {
            $user->delete();
            return redirect('/users');
        }else {
            return redirect('/users');
        }
    }
    function services(){
        $Sdata = Service::all();
        $categories = Category::all();
        return view('services', ['service'=>$Sdata, 'categories'=>$categories]);
    }

    function addService(Request $req){
        $service = new service;
        $service->name=$req->name;
        $service->picture=$req->image;
        $service->category=$req->category;
        $service->description=$req->description;
        $service->price=$req->price;
        $service->save();
        return redirect('/services');
    }
}
