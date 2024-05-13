<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category_id = $request->category_id;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $keyword = $request->keyword;

        $query = Product::query();

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        if ($min_price) {
            $query->where('price', '>=', $min_price);
        }

        if ($max_price) {
            $query->where('price', '<=', $max_price);
        }

        if ($keyword) {
            $query->where('name', 'LIKE', '%'. $keyword. '%');
        }

        $products = $query->paginate(10);

        // カテゴリ一覧（商品件数付き）
        $categories = Category::orderBy('id')->with('products')->get();

        
        return view('index', [
            'products' => $products,
            'categories' => $categories,            
        ]);
    }

}
