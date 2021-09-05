<?php

$html = <<<HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Title of the document</title>
</head>
<body>
<h1>這是第一頁 (a)</h1>
<p>步驟開始</p>
<a href="b.php">下一步(B)</a>


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