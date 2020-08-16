<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Shipment;
 

class ShipmentController extends Controller
{
    public function newShip(Request $request){
        $user_id=$request->user()->id;
        $cart=Cart::where('user_id',$user_id)->first();
        $order= Order::where('cart_id', $cart->id)->orderBy('id','desc')->first();
        $shipment= new Shipment();
        $shipment->date= Carbon::now();
    }
}
