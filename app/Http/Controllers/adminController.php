<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Order;

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

    function addCategory(Request $req){
        $category = new Category;
        $category->name=$req->name;
        $category->image=$req->image;
        $category->save();
        return redirect('/category');
    }
}
