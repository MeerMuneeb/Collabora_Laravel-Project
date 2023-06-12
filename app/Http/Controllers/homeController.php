<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Order;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class homeController extends Controller
{
    function index(Request $req){
        if($req->session()->has('user')){
            $user = $req->session()->get('user')['name'];
            return view('home', ['user'=>$user]);
        }else {
            return view('home');
        }
    }
    public function toExplore()
    {
        // $data= user::latest()->first();
        // log::debug("YOUTTAG",[$data]);        
        $data = Service::all();
        return view('explore', ['services'=>$data]);
    }
    function detail($id){

        $data = Service::find($id);
        return view('detail', ['service'=>$data]);
    }

    function purchased(Request $req){
        if($req->session()->has('user')){
            $order = new Order;
            $order->user_id=$req->session()->get('user')['id'];
            $order->service_id=$req->service_id;
            $order->save();
            $req->session()->flash('success', 'Purchase Completed Successfully! The Mentor will Contact you Shortly.');
            return Redirect::to('/?success=Purchase%20Completed%20Successfully!%20The%20Mentor%20will%20Contact%20you%20Shortly.');
        }
        else{
            return redirect('/login');
        }
        
    }
}
