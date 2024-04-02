<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用戶登入</title>
</head>
<body>
    <h1>登入</h1>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="./lact" method="post">
        @csrf
        用戶名: <input type="text" name="user" id=""><br>
        密碼: <input type="text" name="pwd" id=""><br>
        驗證碼: <input type="text" name="code" id="">
       <img src="{{ captcha_src('math') }}" alt=""><br>
        <button>登入</button>
    </form>
</body>
</html>