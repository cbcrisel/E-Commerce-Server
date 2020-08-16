<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Exception;

class OrderController extends Controller
{
    public function addOrder($productId,Request $request){
        $response='Productos Añadidos Exitosamente';
        $code=200;
        try{
            $user_id=$request->user()->id;
            $cart=Cart::where('user_id',$user_id)->first();
            $product=Product::where('id',$productId)->first();
            if($cart->status=='Vacio'){
                $order=new Order();
                $order->date=Carbon::now();
                $order->total_price=($product->price*$request['product_amount']);
                $order->cart_id=$cart->id;
                $cart->status='Pendiente';
                $cart->save();
                $order->save();
                DB::table('order_details')->insert([
                    'product_id'=>$product->id,
                    'order_id'=>$order->id,
                    'price_by_unit'=>$product->price,
                    'product_amount'=>$request['product_amount'],
                    'total_price'=>($product->price*$request['product_amount'])
                ]);
            }else if($cart->status=='Pendiente'){
                $oldOrder= Order::where('cart_id', $cart->id)->orderBy('id','desc')->first();
                $oldOrder->total_price=$oldOrder->total_price+($product->price*$request['product_amount']);
                $oldOrder->save();
                DB::table('order_details')->insert([
                    'product_id'=>$product->id,
                    'order_id'=>$oldOrder->id,
                    'price_by_unit'=>$product->price,
                    'product_amount'=>$request['product_amount'],
                    'total_price'=>($product->price*$request['product_amount'])
                ]);
            }
            
        }catch(Exception $e){
            $code=500;
            $response='Error';
        }
        finally{
            return response()->json($response,$code);
        }
    } 
}
