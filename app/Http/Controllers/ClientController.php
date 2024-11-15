<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    // Trang chủ
    public function home()
    {
        // Lấy thông tin user
        $products = Product::all();  // Lấy danh sách sản phẩm
        $categories = Category::all();
        $user = Auth::user();
        return view('home', [
            'user' => $user,
            'products' => $products,
            'categories' => $categories
        ]);
    }

    // Trang danh mục theo ID
    public function category($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        if (!$category) {
            abort(404);
        }

        $user = Auth::user();

        $categories = DB::table('categories')->get();

        $products = DB::table('products')
            ->where('category_id', $id)
            ->get();

        return view('products', [
            'category' => $category,
            'categories' => $categories,
            'products' => $products,
            'user' => $user,
        ]);
    }

    // Trang danh sách sản phẩm
    public function products()
    {
        $products = DB::table('products')->get();
        $user = Auth::user();

        return view('products', [
            'products' => $products,
            'user' => $user,
        ]);
    }

    // Trang chi tiết sản phẩm
    public function detail($id)
    {
        $user = Auth::user();
        $product = DB::table('products')->where('id', $id)->first();
        if (!$product) {
            abort(404);
        }

        // Lấy tất cả bình luận liên quan đến sản phẩm
        $comments = DB::table('comments')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.comment', 'comments.created_at', 'users.fullname as user_name')
            ->where('comments.product_id', $id) // Dùng $id thay vì $productId
            ->get();


        $categories = DB::table('categories')->get();

        return view('detail', [
            'product' => $product,
            'categories' => $categories,
            'user' => $user,
            'comments' => $comments,
        ]);
    }



    public function profile()
    {
        $products = Product::all();
        $categories = Category::all();
        $user = Auth::user();
        return view('profile', [
            'user' => $user,
            'products' => $products,
            'categories' => $categories
        ]);
    }
}

