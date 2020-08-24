<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Shipment;
use App\Cart;
use App\Order;
use DB;
use Exception;
 

class ShipmentController extends Controller
{
    public function newShip(Request $request){
        try{
        $user_id=$request->user()->id;
        $cart=Cart::where('user_id',$user_id)->first();
        $order= Order::where('cart_id', $cart->id)->orderBy('id','desc')->first();
        $shipment= new Shipment();
        $shipment->date= Carbon::now();
        $shipment->status='En Proceso';
        $shipment->user_id=$user_id;
        $shipment->order_id=$order->id;
        $shipment->created_at=Carbon::now();
        $cart->status='Vacio';
        $shipment->save();
        $cart->save();
        return response()->json('Envio Aceptado',200);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
    public function setInNextStage($ship_id){
        try{
            $shipment=Shipment::find($ship_id);
            if($shipment->status=='En Proceso'){
                $shipment->status='El producto esta en camino';
                $shipment->save();
            return response()->json('Cambio Exitoso');
            }if($shipment->status=='El producto esta en camino'){
                $shipment->status='Entregado';
                $shipment->save();
            return response()->json('Cambio Exitoso');
            }
            $shipment->save();
            return response()->json('Cambio Exitoso');
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
    /* public function getShipsOfAUser(Request $request){
        $user_id=$request->user()->id;     
        $shipments=Shipment::where('user_id',$user_id)->get();   
        return response()->json($shipments->toArray(),200);
    } */
    public function getShips(){
        //$shipments=Shipment::all();
        $shipments=DB::table('shipments')
        ->join('users','shipments.user_id','users.id')
        ->select(
            'shipments.*',
            'users.email'
        )->get();
        return response()->json($shipments->toArray(),200);
    }
    public function getShipsOfAUser(Request $request){
        //$shipments=Shipment::all();
        try{
        $user_id=$request->user()->id; 
        $shipments=DB::table('shipments')
        ->where('shipments.user_id',$user_id)
        ->join('users','shipments.user_id','users.id')
        ->join('orders','shipments.order_id','orders.id')
        ->select(
            'shipments.*',
            'users.email',
            'orders.total_price'
        ) ->orderByRaw('created_at DESC')
        ->get();
        return response()->json($shipments->toArray(),200);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
}
