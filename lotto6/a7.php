<?php
$min = 1;
$max = 42;
$total = 6;

$a_full = range($min, $max);
shuffle($a_full);
$a_box = array_slice($a_full, 0, $total);

/*
echo '<pre>';
print_r($a_full);
echo '</pre>';
*/

$str = '';
foreach($a_box as $one)
{
    $str .= '<img src="images/' . $a_full[$one] . '.jpg">';
}

sort($a_box);

$str_sort = '';
foreach($a_box as $one)
{
    $str_sort .= '<img src="images/' . $a_full[$one] . '.jpg">';
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
<p>原來順序：{$str}</p>
<p>由小到大：{$str_sort}</p>

</body>
</html>
HEREDOC;

echo $html;
?>