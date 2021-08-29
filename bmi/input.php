<?php

$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Title of the document</title>
</head>
<body>
<h1>BMI</h1>
<p>檢測你的身體質量指數</p>

<form method="post" action="calc.php">
<p>身高：<input type="text" name="height" size="4"> 公分</p>
<p>體重：<input type="text" name="weight" size="4"> 公斤</p>
<p><input type="submit" value="計算 BMI"></p>
</form>

</body>
</html>
HEREDOC;

echo $html;
?>
