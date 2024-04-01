<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add</title>
</head>
<body>
    <h1>學生添加</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="./save" method="post" enctype="multipart/form-data">
        @csrf
        姓名:<input type="text" name="name" id=""><br>
        頭像:<input type="file" name='logo'><br>
        性別:
        <input type="radio" name="sex" value="男">男
        <input type="radio" name="sex" value="女">女
        <br>
        年齡: <input type="number" name="age" id="">
        <br>
        生日:<input type="date"  name="birthday"><br>
        專業: <select name="m_id" id="">
            @foreach($majors as $v)
            <option value="{{$v['id']}}">{{$v['major']}}</option>
            @endforeach
        </select>
        <button>添加</button>
    </form>
</body>
</html>