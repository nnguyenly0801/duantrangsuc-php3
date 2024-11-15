<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Tổng số sản phẩm
        $totalProducts = Product::count();

        $productsByCategory = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('categories.name', DB::raw('COUNT(products.quantity) as total_products'))
            ->groupBy('categories.name')
            ->get();

        return view('admin.index', compact('user', 'totalProducts', 'productsByCategory'));
    }

    public function productslist()
    {
        $products = Product::query()->latest('id')->paginate(10);

        return view('admin.products.list', compact('products'));
    }

    public function productscreate()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    //Tạo mới dữ liệu
    public function productsstore(Request $request)
    {
        $data = $request->except('image');

        //Khi chưa có hình ảnh
        $path = "";
        //Khi có hình
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
        }
        //Đưa đường dẫn hình vào data
        $data['image'] = $path;

        //Insert data
        Product::query()->create($data);

        return redirect()->route('admin.products.list')->with('message', 'Thêm dữ liệu thành công');
    }


    // Xóa dữ liệu
    public function productsdestroy(Product $product)
    {
        // Kiểm tra xem sản phẩm có hình ảnh hay không
        if ($product->image && Storage::exists($product->image)) {
            // Xóa ảnh nếu tồn tại
            Storage::delete($product->image);
        }

        // Xóa sản phẩm
        $product->delete();

        return redirect()->route('admin.products.list')->with('message', 'Xóa dữ liệu thành công!');
    }

    //Detail
    public function productsdetail(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.detail', compact('product', 'categories'));
    }

    // Hiển thị form cập nhật

    public function productsedit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Cập nhật thông tin
    public function productsupdate(Request $request, Product $product)
    {
        $data = $request->except('image');

        //Nếu cập nhật ảnh
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $data['image'] = $path;

            // Xóa ảnh cũ
            Storage::delete($product->image);
        }

        //Cập nhật dữ liệu
        $product->update($data);

        return redirect()->route('admin.products.list')->with('message', 'Cập nhật dữ liệu thành công!');
    }


    // End Products


    // Category
    public function categorieslist()
    {
        $categories = Category::query();

        return view('admin.categories.list', compact('categories'));
    }

    public function categoriescreate()
    {
        $categories = Category::all();

        return view('admin.categories.create', compact('categories'));
    }

    //Tạo mới dữ liệu
    public function categoriesstore(Request $request)
    {
        $data = $request->except('image');

        //Insert data
        Category::query()->create($data);

        return redirect()->route('admin.categories.list')->with('message', 'Thêm dữ liệu thành công');
    }


    // Xóa dữ liệu
    public function categoriesdestroy(Category $category)
    {
        // Xóa sản phẩm
        $category->delete();

        return redirect()->route('admin.categories.list')->with('message', 'Xóa dữ liệu thành công!');
    }

    // Hiển thị form cập nhật

    public function categoriesedit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    // Cập nhật thông tin
    public function categoriesupdate(Request $request, Category $category)
    {
        $data = $request->except('image');

        //Cập nhật dữ liệu
        $category->update($data);

        return redirect()->route('admin.categories.list')->with('message', 'Cập nhật dữ liệu thành công!');
    }


    // Users
    public function userslist()
    {
        $users = User::query()->get();

        return view('admin.users.list', compact('users'));
    }


    public function userscreate()
    {
        $users = User::all();

        return view('admin.users.create', compact('users'));
    }

    //Tạo mới dữ liệu
    public function usersstore(Request $request)
    {
        //$data['role'] = $request->input('role'); // Chỉ cần thêm dòng này

        $data = $request->validate([
            'username' => ['required', 'min:3', 'unique:users'],
            'fullname' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:5'],
            'address' => ['required', 'min:5'],
            'confirm_password' => ['required', 'same:password'],
            'role' => ['required', 'in:admin,user'],
        ]);

        //Insert data
        User::query()->create($data);

        return redirect()->route('admin.users.list')->with('message', 'Thêm dữ liệu thành công');
    }


    // Xóa dữ liệu
    public function usersdestroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.list')->with('message', 'Bạn không thể xóa chính mình.');
        }

        // Xóa sản phẩm
        $user->delete();

        return redirect()->route('admin.users.list')->with('message', 'Xóa dữ liệu thành công!');
    }

    // Hiển thị form cập nhật

    public function usersedit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }


    // Cập nhật thông tin
    public function usersupdate(Request $request, User $user)
    {
        // Thực hiện xác thực
        $data = $request->validate([
            'username' => [
                'required',
                'min:3',
                'unique:users,username,' . $user->id, // Đảm bảo loại trừ id của bản ghi hiện tại
            ],
            'fullname' => ['required', 'min:3'],
            'email' => [
                'required',
                'email',
                'unique:users,email,' . $user->id, // Đảm bảo loại trừ id của bản ghi hiện tại
            ],
            'password' => ['nullable', 'min:5'], // Cho phép để trống
            'address' => ['required', 'min:5'],
            'role' => ['required', 'in:admin,user'],
        ]);

        // Cập nhật thông tin
        $user->update($data);

        // Nếu password không được cập nhật, bỏ qua trường password
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password); // Băm password
            $user->save(); // Lưu thay đổi
        }

        return redirect()->route('admin.users.list')->with('message', 'Cập nhật dữ liệu thành công!');
    }


    public function commentslist()
    {
        $comments = DB::table('comments')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.name as user_name')
            ->orderBy('comments.created_at', 'desc')
            ->get();

        return view('admin.comments.list', compact('comments'));
    }


    // Xóa bình luận
    public function commentsdestroy($id)
    {
        DB::table('comments')->where('id', $id)->delete();
        return redirect()->route('admin.comments.index')->with('success', 'Bình luận đã được xóa thành công');
    }
}
