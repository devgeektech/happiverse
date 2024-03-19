<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use DB;
class OrderDetailController extends Controller
{
    public function index($orderId)
    {
        $orderById = Order::where('orderId', $orderId)->firstOrFail();
        return view('business.order-detail.index', compact('orderById'));
    }
    public function cancelOrder($orderId)
    {
        $orderById = Order::where('orderId', $orderId)->first();
        DB::table('businessOrders')->where('orderId', $orderId)->update(array('orderStatus' => 3));
        return redirect()->back();
        
    }
}
