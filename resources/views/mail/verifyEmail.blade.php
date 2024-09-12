<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Xin chào {{$userName}}</h1>
    <p>Cảm ơn bạn đã thực hiện đăng kí tài khoản sinh viên của mình</p>
    <p>Xin hãy xác nhận để tiếp tục sử dụng tài khoản</p>
    <button>
        <a href="{{route('verify', $token)}}">Xác thực tài khoản</a>
    </button>
</body>
</html>