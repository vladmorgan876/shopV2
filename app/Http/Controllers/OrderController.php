<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function MakeOrder(Request $request)
    {
        $order=new Order();
        $order->username = $request->name;
        $order->email = $request->email;
        $order->productname = $request->productname;
        $order->productprice = $request->productprice;
        $order->productquantity = $request->productquantity;
        $order->category=$request->category;
        $order->status='принят';
        $order->orderdate= date('Y-m-d');
        $order->totalsum=$request->productprice*$request->productquantity;
        $order->save();
        Log::channel('orderlogging')->debug('заказ принят',$order->toArray());
            return response()->json([
                "message" => "New order is created"
            ]);
    }


}
