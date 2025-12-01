<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductController extends Controller
{
    // HIỂN THỊ TRANG CHỦ (Tất cả sản phẩm)
    public function index()
    {
        $categories = Category::all();
        
        // Lấy sản phẩm, kèm theo biến thể giá thấp nhất để hiển thị
        $products = Product::with('minPriceVariant')
                           ->latest()
                           ->paginate(100);
                           
        $category = null;

        // Trả về biến $products
        return view('Home.index', compact('categories', 'products', 'category'));
    }

    // HIỂN THỊ CHI TIẾT SẢN PHẨM
    public function productDetail(string $id)
    {
        
        $product = Product::with('variants')->findOrFail($id);
        $currentVariant = $product->variants->first();

        if (!$currentVariant) {
             return redirect()->back()->with('error', 'Sản phẩm đang cập nhật.');
        }

        $allVariants = $product->variants;
        $uniqueColors = $allVariants->pluck('color')->unique();
        
        // Lấy danh sách size thực tế có trong kho
        $availableSizes = $allVariants->pluck('size')->unique()->sort()->values()->toArray();

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

    // HIỂN THỊ SẢN PHẨM THEO DANH MỤC
    public function show(string $id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->with('minPriceVariant')->latest()->paginate(12);

        return view('Home.index', compact('categories', 'products', 'category'));
    }
}