<?php
$min = 1;
$max = 12;
$total = 6;

$a_box =array();
$check = '';
for($i=1; $i<=$total; $i++) 
{
    do {
        $num = mt_rand($min, $max);
        $check .= $num . ', ';
    } while( in_array($num, $a_box) );

    $a_box[] = $num;
}

$str = '';
foreach($a_box as $one)
{
    $str .= '<img src="images/' . $one . '.jpg">';
}

sort($a_box);

$str_sort = '';
foreach($a_box as $one)
{
    $str_sort .= '<img src="images/' . $one . '.jpg">';
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
<p>檢查出現過的數字：{$check}</p>
<p>原來順序：{$str}</p>
<p>由小到大：{$str_sort}</p>

</body>
</html>
HEREDOC;

echo $html;
?>