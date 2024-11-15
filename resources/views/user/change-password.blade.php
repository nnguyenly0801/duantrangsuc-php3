<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <h3>Cập nhật mật khẩu</h3>
        <form action="{{ route('user.edit-password', ['id' => $user->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mt-3">
                <label for="">Mật khẩu cũ</label>
                <input type="password" name="current_password" class="form-control">
            </div>
            @error('current_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mt-3">
                <label for="">Mật khẩu mới</label>
                <input type="password" name="new_password" class="form-control">
            </div>
            @error('new_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="mb-3">
                <label for="" class="form-label">Xác nhận mật khẩu mới</label>
                <input type="password" name="new_password_confirmation" id="" class="form-control">
            </div>
            @error('new_password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <button class="btn btn-danger mt-3" type="submit">Sửa</button>

        </form>
    </div>
</body>

</html>
