<?php
$today = date('Y年m月d日', time());

$name = '陳信嘉';
$birth = 1967;
$photo = 'images/head1.jpg';

// 另一個人
// $name = '阮經天';
// $birth = 1998;
// $photo = 'images/head2.jpg';

// $age = 2021 - $birth;
$age = date('Y', time()) - $birth;  // 今年是會變動的


$html = <<<HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>自我介紹</title>
</head>
<body>
<h1>Hello World</h1>
<p>今天是：{$today}</p>
<p>姓名：{$name}</p>
<p>年齡：{$age}</p>
<p><img src="{$photo}"></p>

</body>
</html>
HEREDOC;

echo $html;
?>