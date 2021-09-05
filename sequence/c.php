<?php
// 定義前一頁合法指定的網址
$url_prev = 'http://localhost/myweb/sequence/b.php';
$url_start = 'a.php';


$refer = $_SERVER['HTTP_REFERER'];  // 呼叫此程式之前頁
if($refer != $url_prev)
{
    header('Location:' . $url_start);
}


$html = <<<HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Title of the document</title>
</head>
<body>
<h1>這是第三頁 (c)</h1>
<p>完成操作！</p>


<hr>
<h2>以下測試用</h2>
<p><a href="a.php">page A</a></p>
<p><a href="b.php">page B</a></p>
<p><a href="c.php">page C</a></p>
<p><a href="refer.php">查看 \$_SERVER 變數</a></p>


</body>
</html>
HEREDOC;

echo $html;
?>