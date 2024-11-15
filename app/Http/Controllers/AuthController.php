<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //Login
    public function getlogin()
    {
        return view('login');
    }

    public function postlogin(Request $request)
    {
        $user = $request->only(['email', 'password']);

        //Xác thực thông tin của user
        if (Auth::attempt($user)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('message', 'Email hoặc Password không chính xác');
        }
    }

    public function getregister()
    {
        return view('register');
    }
    public function postregister(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'min:3', 'unique:users'],
            'fullname' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:5'],
            'confirm_password' => ['required', 'same:password'],
        ]);

       User::query()->create($data);

        return redirect()->route('login')->with('message', 'Đăng ký tài khoản thành công');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function updateProfile()
    {
        $user = Auth::user(); // Lấy người dùng hiện tại
        return view('user.update', compact('user'));
    }

    public function editProfile(Request $request, $id)
    {
        // Kiểm tra nếu người dùng đang đăng nhập và có quyền
        if (Auth::id() !== (int) $id) {
            return redirect()->route('user.profile', ['id' => Auth::id()])->with('error', 'Bạn không có quyền cập nhật thông tin.');
        }

        // Xác thực dữ liệu
        $data = $request->validate([
            'username' => ['required', 'min:3', 'unique:users,username,' . $id],
            'fullname' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'address' => ['required'],
        ]);

        // Cập nhật thông tin người dùng
        User::where('id', $id)->update($data);

        return redirect()->route('profile', ['id' => $id])->with('message', 'Thông tin đã được cập nhật');
    }

    public function changePassword()
    {
        $user = Auth::user(); // Lấy người dùng hiện tại
        return view('user.change-password', compact('user'));
    }

    public function editPassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:5', 'confirmed'], // Kiểm tra mật khẩu mới
        ]);

        $user = Auth::user(); // Lấy thông tin người dùng hiện tại

        // Kiểm tra mật khẩu hiện tại
        $currentPassword = DB::table('users')->where('id', $user->id)->value('password');
        if (!password_verify($request->current_password, $currentPassword)) {
            return redirect()->back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }

        // Cập nhật mật khẩu mới vào cơ sở dữ liệu
        DB::table('users')
            ->where('id', $user->id)
            ->update(['password' => bcrypt($request->new_password)]);

            return redirect()->route('profile', ['id' => $user->id])->with('message', 'Đổi mật khẩu thành công!');

    }
}