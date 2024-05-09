<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductCntroller extends Controller
{
    public function index(Request $request) {
        //クエリ構築
        $product_query = Product::with('category');

        //Narrow down
        if($request->category_id) {
            $product_query->where('category_id' , $request->category_id);
        }
        //end of narrow down

        //lowest price cheak
        if($request->low_price) {
            $product_query->where('price' , '>=' , $request->low_price);
        }
        //end of lower price check

        //highest price
        if($request->high_price) {
            $product_query->where('price' , '<=' , $request->high_price);
        }
        //end of highest price

        //Keyword search
        if($request->keyword) {
            $product_query->where('name' , 'LIKE' , "%{$request->keyword}%");
        }
        //end of Keyword search

        $products_result  = $query->orderBy('created_at' , 'desc')->paginate(10);//検索結果格納
        $narrow_down_list = Category::withCount('categories')->get();//一覧を取得
        
        return view('top' , [
            'products' => $products,
            'categories' => $categories,
        ]);

    }
}
