<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>fibonacci</h1>
    <?php
    function fibonacci($n) {
        $fib = [0, 1];
        for ($i = 2; $i < $n; $i++) {
            $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
        }
        return $fib;
    }
    
    // 生成斐波那契数列的前 n 个数字
    $n = 10; // 例如，这里生成前 10 个斐波那契数列
    $fibonacci_sequence = fibonacci($n);
    echo "斐波那契数列的前 $n 个数字：\n";
    print_r (fibonacci($n));
    echo implode(', ', $fibonacci_sequence);
    ?>
    
</body>
</html>