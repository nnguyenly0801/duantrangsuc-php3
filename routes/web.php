<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Category;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// $category = DB::table('categories')->get();

// Route::get('/', function () {
//     $category = DB::table('categories')->get();

//     $product = DB::table('products')->get();

//     // Lấy 8 sách có giá cao nhất
//     $highestPriceProducts = DB::table('products')
//         ->orderBy('price', 'desc')
//         ->limit(8)
//         ->get();

//     return view('home', [
//         'category' => $category,
//         'product' => $product,
//         'highestPriceProducts' => $highestPriceProducts,
//     ]);
// })->name('home');

// Route::get('/category/{id}', function ($id) {
//     $category = Category::find($id);
//     if (!$category) {
//         abort(404);
//     }

//     $category = DB::table('categories')->get();

//     $products = DB::table('products')
//         ->where('category_id', $id)
//         ->get();

//     return view('products', [
//         'category' => $category,
//         'products' => $products,
//     ]);
// });

// Route::get('/products', function () {

//     $product = DB::table('products')->get();

//     return view('products', [
//         'product' => $product,
//     ]
//     );
// })->name('products');

// Route::get('/detail/{id}', function ($id) {
//     $product = DB::table('products')->find($id);
//     $category = DB::table('categories')->get();

//     return view('detail', [
//         'product' => $product,
//         'category' => $category
//     ]);
// })->name('detail');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/payment', function () {
    return view('payment');
})->name('payment');

// Route::get('/login', function () {
//     return view('login');
// })->name('login');

// Route::get('/register', function () {
//     return view('register');
// })->name('register');

Route::get('/', [ClientController::class, 'home'])->name('home');

Route::get('/category/{id}', [ClientController::class, 'category'])->name('category');

Route::get('/products', [ClientController::class, 'products'])->name('products');

Route::get('/detail/{id}', [ClientController::class, 'detail'])->name('detail');

Route::get('/profile/{id}', [ClientController::class, 'profile'])->name('profile');

// Route hiển thị bình luận của một sản phẩm
Route::get('/products/{productId}/comments', [CommentController::class, 'showCommentsByProduct']);

// Route lưu bình luận cho một sản phẩm (yêu cầu đăng nhập)
Route::post('/products/{productId}/comments', [CommentController::class, 'storeComment'])->middleware('auth');


Route::get('/user/update', [AuthController::class, 'updateProfile'])->name('user.update');
Route::put('/user/update/{id}', [AuthController::class, 'editProfile'])->name('user.edit');

Route::get('/user/change-password', [AuthController::class, 'changePassword'])->name('user.change-password');
Route::put('/user/change-password/{id}', [AuthController::class, 'editPassword'])->name('user.edit-password');


// Admin
Route::middleware([Authenticate::class, CheckAuth::class])->group(function () {
    Route::prefix('admin')->group(function () {
        //Route::get('products', [AdminController::class, 'test']);
        //Route::get('/products', [AdminController::class, 'index'])->name('admin.products.index');

        Route::get('/', [AdminController::class, 'index'])->name('admin.index')->middleware('checkAuth');

        Route::prefix('/products')->group(function () {
            Route::get('', [AdminController::class, 'productslist'])->name('admin.products.list');

            Route::get('/create', [AdminController::class, 'productscreate'])->name('admin.products.create');
            Route::post('/create', [AdminController::class, 'productsstore'])->name('admin.products.store');

            Route::get('/edit/{product}', [AdminController::class, 'productsedit'])->name('admin.products.edit');
            Route::put('/edit/{product}', [AdminController::class, 'productsupdate'])->name('admin.products.update');

            Route::get('/detail/{product}', [AdminController::class, 'productsdetail'])->name('admin.products.detail');

            Route::delete('/delete/{product}', [AdminController::class, 'productsdestroy'])->name('admin.products.destroy');

            Route::get('/trashed', [AdminController::class, 'listFlightTrash'])->name('admin.products.trashed');
            Route::get('/restore/{id}', [AdminController::class, 'restore'])->name('admin.products.restore');


        });

        Route::prefix('/categories')->group(function () {
            Route::get('/', [AdminController::class, 'categorieslist'])->name('admin.categories.list');

            Route::get('/create', [AdminController::class, 'categoriescreate'])->name('admin.categories.create');
            Route::post('/create', [AdminController::class, 'categoriesstore'])->name('admin.categories.store');

            Route::get('/edit/{category}', [AdminController::class, 'categoriesedit'])->name('admin.categories.edit');
            Route::put('/edit/{category}', [AdminController::class, 'categoriesupdate'])->name('admin.categories.update');

            Route::delete('/delete/{category}', [AdminController::class, 'categoriesdestroy'])->name('admin.categories.destroy');
        });

        Route::prefix('/users')->group(function () {
            Route::get('/', [AdminController::class, 'userslist'])->name('admin.users.list');

            Route::get('/create', [AdminController::class, 'userscreate'])->name('admin.users.create');
            Route::post('/create', [AdminController::class, 'usersstore'])->name('admin.users.store');

            Route::get('/edit/{user}', [AdminController::class, 'usersedit'])->name('admin.users.edit');
            Route::put('/edit/{user}', [AdminController::class, 'usersupdate'])->name('admin.users.update');

            Route::delete('/delete/{user}', [AdminController::class, 'usersdestroy'])->name('admin.users.destroy');
            
        });

        Route::get('/comments', [CommentController::class, 'commentslist'])->name('admin.comments.list');
        Route::delete('/comments/{id}', [CommentController::class, 'commentsdestroy'])->name('admin.comments.destroy');

    });
});


//Login register, logout
Route::get('/login', [AuthController::class, 'getlogin'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin'])->name('postlogin');

Route::get('/register', [AuthController::class, 'getregister'])->name('register');
Route::post('/register', [AuthController::class, 'postregister'])->name('postregister');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

