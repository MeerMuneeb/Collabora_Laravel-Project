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

    function editCategory(Request $req){
        $category = Category::find($req->Cid);        
        $category->name=$req->name;
        if (!empty($req->image)) {
            $category->image=$req->image;
        }
        $category->save();
        return redirect('/category');
    }

    //IMPORTANT NEED TO DELETE ORDERS AND SERVICES IF ANY CATEGORY IS DELETED
    function deleteCategory(Request $req){
        $category = Category::find($req->Cid);
        if ($category) {

            //Getting IDs
            $serviceIds = Service::where('category', $req->Cid)->pluck('id')->toArray();
            $orderIds = Order::whereIn('service_id', $serviceIds)->pluck('id')->toArray();


            // Delete the category
            $category->delete();
            Service::where('category', $req->Cid)->delete();
            Order::whereIn('id', $orderIds)->delete();

            return redirect('/category');
        }else {
            return redirect('/category');
        }
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
            Order::where('user_id', $req->Uid)->delete();
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
        $service = new Service;
        $service->name=$req->name;
        $service->picture=$req->image;
        $service->category=$req->category;
        $service->description=$req->description;
        $service->price=$req->price;
        $service->save();
        return redirect('/services');
    }

    function editService(Request $req){
        $service = Service::find($req->Sid);        
        $service->name=$req->name;
        if (!empty($req->image)) {
            $service->picture=$req->image;
        }
        $service->category=$req->category;
        $service->description=$req->description;
        $service->price=$req->price;
        $service->save();
        return redirect('/services');
    }

    function deleteService(Request $req){
        $service = Service::find($req->Sid);
        if ($service) {
            $service->delete();            
            Order::where('service_id', $req->Sid)->delete();
            return redirect('/services');
        }else {
            return redirect('/services');
        }
    }
}
