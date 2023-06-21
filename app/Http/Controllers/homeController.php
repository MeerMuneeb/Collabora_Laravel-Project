<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class homeController extends Controller
{
    function index(Request $req){
        $categories = Category::all();
        $Sdata = Service::all();
        if($req->session()->has('user')){
            $user = $req->session()->get('user')['name'];
            return view('home', ['user'=>$user, 'categories'=>$categories, 'services'=>$Sdata]);
        }else {
            return view('home', ['categories'=>$categories, 'services'=>$Sdata]);
        }
    }
    public function toExplore()
    {
        // $data= user::latest()->first();
        // log::debug("YOUTTAG",[$data]);        
        $data = Service::all();
        $flag = 'false';
        return view('explore', ['services' => $data, 'searchFlag' => $flag]);;
    }
    function detail($id){

        $data = Service::find($id);
        $Category = Category::find($data->category);
        $Sdata = Service::all();
        return view('detail', ['service'=>$data, 'services'=>$Sdata, 'category'=>$Category]);
    }

    function Cexplore($id){

        $data = Service::where('category', $id)->get();
        $category = Category::find($id);
        return view('Cexplore', ['services'=>$data, 'category'=>$category]);
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

    function searchDetail(Request $req){
        $searchString = $req->Sname;
        $data = Service::where('name', 'like', '%' . $searchString . '%')->get();
        $flag = 'true';
        return view('explore', ['services' => $data, 'searchFlag' => $flag, 'searchString' => $searchString]);;
    }
  
   

}
