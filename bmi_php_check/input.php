<?php
$status = isset($_GET['status']) ? $_GET['status'] : '';
$h = isset($_GET['h']) ? $_GET['h'] : '';
$w = isset($_GET['w']) ? $_GET['w'] : '';

$msg = '';
if($status=='error')
{
    $msg = '<span style="color:red;">身高不能為零</span>';
}

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
{$msg}
<form method="post" action="calc.php">
<p>身高：<input type="text" name="height" value="{$h}" size="4"> 公分</p>
<p>體重：<input type="text" name="weight" value="{$w}" size="4"> 公斤</p>
<p><input type="submit" value="計算 BMI"></p>
</form>

</body>
</html>
HEREDOC;

echo $html;
?>
