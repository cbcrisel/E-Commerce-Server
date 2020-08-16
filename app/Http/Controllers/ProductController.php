<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function getAll(){
        $products=Product::all();
        return response()->json($products->toArray(),200);
    }
    public function getAllProductsOfCategory($category_id){
        $products=Product::where('category_id',$category_id)->get();
        return response()->json($products->toArray(),200);
    }
}
