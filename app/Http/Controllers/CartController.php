<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Exception;

class CartController extends Controller
{
    public function getCart(Request $request){
        try{
            $user_id=$request->user()->id;
            $cart=Cart::where('user_id',$user_id)->first();
            $order= Order::where('cart_id', $cart->id)->orderBy('id','desc')->first();
            $productWithAllInfo=DB::table('order_details')
            ->where('order_id',$order->id)
            ->join('products','order_details.product_id','products.id')
            ->join('orders','order_details.order_id','orders.id')
            ->select(
                'products.id as productId',
                'products.name',
                'products.picture',
                'products.brand',
                'order_details.price_by_unit',
                'order_details.product_amount',
                'orders.total_price as cartTotal',
                'order_details.total_price'
            )->get();
            return response()->json($productWithAllInfo->toArray(),200);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        
    }
    public function getTotal(Request $request){
        $user_id=$request->user()->id;
        $cart=Cart::where('user_id',$user_id)->first();
        $order= Order::where('cart_id', $cart->id)->orderBy('id','desc')->first();
        /* $products=DB::table('order_details')
        ->where('order_id',$order->id)
        ->join('products','order_details.product_id','products.id')
        ->join('orders','order_details.order_id','orders.id')
        ->select(
            'order_details.price_by_unit',
            'order_details.product_amount',
            'order_details.total_price'
        )->get();
        foreach($products as $product){
            $order->total_price=0;
            $order->total_price=$order->total_price=$product->total_price;
            $order->save();
        } */
        $price=$order->total_price;
        return response()->json($price,200);
    }
    public function deleteOrderProduct($productId, Request $request){
        try{
        $user_id=$request->user()->id;
        $cart=Cart::where('user_id',$user_id)->first();
        $order= Order::where('cart_id', $cart->id)->orderBy('id','desc')->first();
        $order_details=DB::table('order_details')->where('product_id',$productId)
        ->join('orders','order_details.order_id','orders.id')
        ->delete();
        $products=DB::table('order_details')
        ->where('order_id',$order->id)
        ->join('products','order_details.product_id','products.id')
        ->join('orders','order_details.order_id','orders.id')
        ->select(
            'order_details.price_by_unit',
            'order_details.product_amount',
            'order_details.total_price'
        )->get();
            $order->total_price=0.00;
        foreach($products as $product){
           
            $order->total_price=$order->total_price+$product->total_price;
            $order->save();
        }
        $price=$order->total_price;
       
        
        return response()->json('Eliminado Correctamente',200);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
    }
}
