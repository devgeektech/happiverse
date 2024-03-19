<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessProduct;

class MarketPlaceController extends Controller
{
    //
    public function index(Request $req){
     $products = BusinessProduct::all();
    return view('user-web.marketPlace.index',compact('products'));
    }
}
