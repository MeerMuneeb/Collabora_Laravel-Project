<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class adminController extends Controller
{
    function index(){
        $order = Order::all();
        return view('dashboard', ['orders'=>$order]);
    }

    function categories(){
    }
}
