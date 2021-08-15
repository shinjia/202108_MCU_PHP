<?php

$num = mt_rand(0, 9);
$pic = 'images/' . $num . '.jpg';

$html = <<<HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Title of the document</title>
</head>
<body>
<h1>Hello World</h1>
{$pic}
<p>你的幸運數字是 {$num}</p>
<p><img src="{$pic}"></p>

</body>
</html>
HEREDOC;

echo $html;
?>