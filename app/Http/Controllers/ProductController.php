<?php

namespace App\Http\Controllers;

use App\Models\BusinessProduct;
use App\Models\BusinessProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $xx=array();
        $loggedIn = Auth::user()->getBusinessDetail ?? "";
        $products = BusinessProduct::where('businessId', $loggedIn->businessId)->get();
        foreach($products as $p => $productsImages){
            $x= BusinessProductImage::where('productId',$productsImages->productId)->get();   
            foreach($x as $xI => $productsImages){
                $xx[$xI]=$productsImages->imageUrl;
            }    
            $products[$p]["businessPImages"]=$xx;
        }
        // dd($products);
        return view('business.product.index', compact('loggedIn', 'products'));
    }
    
    
    
     public function viewUserProduct($pId){
        $product=BusinessProduct::where('productId',$pId)->first();
        $businessDetail = \Auth::user()->getUserDetail ?? "";
        $productImages=BusinessProductImage::where('productId',$pId)->get();
        return view('user-web.marketPlace.product.details', compact('product','productImages','businessDetail'));
    }
    public function addToCart($pId){
        $product=BusinessProduct::where('productId',$pId)->first();
        $businessDetail = \Auth::user()->getUserDetail ?? "";
        $productImages=BusinessProductImage::where('productId',$pId)->get();
        return view('user-web.marketPlace.product.addtocart', compact('product','productImages','businessDetail'));
    }
}
