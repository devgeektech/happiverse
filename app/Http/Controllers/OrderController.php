<?php

namespace App\Http\Controllers;

use App\Models\BusinessOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BusinessProductImage;
use App\Models\BusinessProduct;
use DB;


class OrderController extends Controller
{
    public function index()
    {
       // $loggedIn = Auth::user()->getUserDetail;
        if(Auth::user()->userTypeId==1){
            $loggedIn = Auth::user()->getUserDetail;
            // dd($loggedIn->userId);
            $myOrders = Order::where('userId', $loggedIn->userId)->get();
            
        }else{
            $loggedIn = Auth::user()->getBusinessDetail;
            
            $myOrders = Order::where('businessId', $loggedIn->businessId)->get();
        }
        $xx=array();
        foreach($myOrders as $p => $order){
            $x= BusinessProductImage::where('productId',$order->productId)->get();
            if(count($x) > 0){
                foreach($x as $xI => $productsImages){
                    $xx[$xI]=$productsImages->imageUrl;
                }
                $myOrders[$p]["businessPImages"]=$xx;
            }else{
                $myOrders[$p]["businessPImages"]='/public/postdoc/1673174684.jpg';    
            }
            $status=DB::table('order_statuses')->where('statusId',$order->orderStatus)->first(['statusName']);
            if($status){
                $myOrders[$p]["order_status_text"]=$status->statusName;    
            }else{
                $myOrders[$p]["order_status_text"]='QUE';
            }
        }
        // dd($myOrders);
        return view('user-web.orders.index', compact('myOrders'));
    }

    public function show($orderId)
    {
        $orderById = Order::where('orderId', $orderId)->first();
        return view('user-web.orders.show', compact('orderById'));
    }
    
    public function orderPlace(Request $req, $productId)
    {
       $user =   Auth::user()->getUserDetail->userId;
       $prefix = "#";  
        $latestOrder = Order::orderBy('orderId','DESC')->first();
        
        if($latestOrder){
            $orderNo = '#'.str_pad($latestOrder->orderId + 1, 5, "0", STR_PAD_LEFT);
        }else{
            $orderNo = '#'.str_pad(1 + 1, 5, "0", STR_PAD_LEFT);
        }

       Order::create([
           
            'userId' =>$user,
            'productId' =>$productId,
            'orderNo' =>$orderNo ,
            'businessId' =>$req->product_businessId,
            'orderCost' =>$req->product_price,
            'shippingCost' =>0,
         	'shippingAddress' =>'adress',
         	'totalAmount' =>$req->product_price,
             
            
          
           
        ]);
        return redirect()->back();
    }
}

