<?php

namespace App\Http\Controllers;
use App\Category;
use DB;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll(){
        $categories= Category::all();
        return response()->json($categories->toArray(),200);
    }
    public function getWithCategories(){
        $productsWithcategories = DB::table('products')
            ->join('categories', 'products.category_id', 'categories.id')
            ->select('products.*', 'categories.name as categoryName', 'categories.id as categoryId')
            ->get();
        return response()->json($productsWithcategories->toArray(),200);
    }
}
