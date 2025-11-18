<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $variants = ProductVariant::with('product')->paginate(100);
        $category = null;

        return view('Home.index', compact('categories', 'variants', 'category'));
    }

    public function productDetail(string $id)
    {
        $currentVariant = ProductVariant::findOrFail($id);
        $product = $currentVariant->product;
        $allVariants = $product->variants;
        $uniqueColors = $allVariants->pluck('color')->unique();
        $availableSizes = [37, 38, 39, 40, 41, 42, 43, 44, 45, 46];

        $categories = Category::all();

        return view('Product.productDetail', compact(
            'currentVariant', 
            'product', 
            'allVariants', 
            'uniqueColors', 
            'availableSizes', 
            'categories'
        ));
    }

    //hiển thị sản phẩm theo danh mục
    public function show(string $id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $productIds = Product::where('category_id', $id)->pluck('product_id');
        $variants = ProductVariant::whereIn('product_id', $productIds)->with('product')->paginate(100);

        return view('Home.index', compact('categories', 'category', 'variants'));
    }
}