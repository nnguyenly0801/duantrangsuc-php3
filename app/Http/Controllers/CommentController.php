<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function storeComment(Request $request, $productId)
    {

        // Kiểm tra người dùng đã đăng nhập chưa
        if (Auth::check()) {
            // Thêm bình luận vào cơ sở dữ liệu
            DB::table('comments')->insert([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'comment' => $request->input('comment'),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return back()->with('success', 'Bình luận đã được thêm');
        } else {
            return back()->with('error', 'Bạn phải đăng nhập để bình luận');
        }
    }

    // Hiển thị bình luận theo sản phẩm
    public function showCommentsByProduct($productId)
    {
        $product = DB::table('products')->where('id', $productId)->first();
        // Lấy tất cả bình luận cho sản phẩm cụ thể
        $comments = DB::table('comments')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.comment', 'comments.created_at', 'users.name as user_name')
            ->where('comments.product_id', $productId) // Lọc theo product_id
            ->get();

        return view('comments.index', compact('comments'));
    }

     // Định nghĩa phương thức commentslist
     public function commentslist()
     {
         $comments = DB::table('comments')
             ->leftJoin('users', 'comments.user_id', '=', 'users.id')
             ->select('comments.*', 'users.fullname as user_name')
             ->orderBy('comments.created_at', 'desc')
             ->get();
 
         return view('admin.comments.list', compact('comments'));
     }
 
     // Xóa bình luận
     public function commentsdestroy($id)
     {
         DB::table('comments')->where('id', $id)->delete();
         return redirect()->route('admin.comments.list')->with('success', 'Bình luận đã được xóa thành công');
     }

}
