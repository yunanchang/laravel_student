<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>animal
{{$name}}
{!!$name!!}
{{$sex}}
{{date('Y-m-d')}}
@if($point>=90)
    very good
@elseif($point>=80)
     good
@elseif($point>=60)
    bad
@else
    so bad
@endif

@isset($abc)
     save
@else
    no save
@endisset
{{$point}}
<?php
    if(isset($abc)){
        echo '在';
    }else{
        echo '不在';
    }
?>
{{$point>=60?'及格':'不及格'}}
</h2>
</body>
</html>