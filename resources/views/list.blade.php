<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>學生列表</h1>
    
   {{-- {{$list}} --}}
  
    <form action="./list" method="get">
    姓名:
    <input type="text" name="key" value="{{ $gets['key']??''}}">
    性別:
    <input type="radio" name='sex' value="男" {{($gets['sex']??'')=='男'?'checked':''}}>男
    <input type="radio" name='sex' value="女" {{($gets['sex']??'')=='女'?'checked':''}}>女
    <br>
    {{-- 專業 --}}
    {{-- {{$majors}} --}}
    @foreach($majors as $v)
    <input type="checkbox" name="mjs[]" value="{{$v['id']}}" {{in_array($v['id'],($gets['mjs'])??[])?'checked':''}}>{{$v['major']}}
    @endforeach
    {{-- {{$gets}} --}}
    @php
    echo '<br>$gets=';
    print_r($gets);
    @endphp
    <button>搜索</button>

   
    </form>
   <a href="./add">添加</a>
    <table border="1">
    <tr>
        <th>學號</th>
        <th>姓名</th>
        <th>生日</th>
        <th>性別</th>
        <th>年齡</th>
        <th>專業</th>
        <th>del_at</th>
        <th>操作</th>
    </tr>
    @forelse ($list as $v)
        
   
    <tr>
        <td>{{$v->id}}</td>
        <td>{{$v['name']}}</td>
        <td>{{$v['headimg']}}</td>
        {{-- <td>{{date('Y-m-d',$v['headimg'])}}</td> --}}
        <td>{{$v['sex']}}</td>
        <td>{{$v['age']}}</td>
        <td>{{$v['major']}}</td>
        <td>{{$v['deleted_at']}}</td>
        <td>
            <a href="./del/{{$v['id']}}">刪除</a>
            <a href="./add">修改</a>
        </td>
       
    </tr>
    @empty
    <tr>
        <th colspan="7">站無數據</th>
       
    </tr>
    @endforelse
{{-- 分頁 --}}
<tr>
    <td>
        {{$list->withQueryString()->links()}}
    </td>
</tr>
{{-- 分頁end --}}
    </table>
</body>
</html>