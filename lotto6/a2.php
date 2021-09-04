<?php
$min = 1;
$max = 12;
$total = 6;

$a_box =array();
for($i=1; $i<=$total; $i++)
{
    $num = mt_rand($min, $max);
    $a_box[] = $num;
}

$str = '';
foreach($a_box as $one)
{
    $str .= '<img src="images/' . $one . '.jpg">';
}

/*
echo '<pre>';
print_r($a_box);
echo '</pre>';
exit;
*/

$html = <<< HEREDOC
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Test</title>
</head>

<body>
<p>我的樂透猜測</p>
<p>
{$str}
</p>

</body>
</html>
HEREDOC;

echo $html;
?>