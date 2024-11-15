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
        
        <h3>Cập nhật thông tin</h3>
        <form action="{{ route('user.edit', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mt-3">
                <label for="">Họ và tên</label>
                <input type="text" name="fullname" class="form-control" value=" {{ $user->fullname }}">
            </div>

            <div class="mt-3">
                <label for="">User name</label>
                <input type="text" name="username" class="form-control" value=" {{ $user->username }}">
            </div>

            <div class="mt-3">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value=" {{ $user->email }}">
            </div>

            <div class="mt-3">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" value=" {{ $user->address }}">
            </div>

            <button class="btn btn-danger mt-3" type="submit">Sửa</button>

        </form>
    </div>
</body>

</html>
