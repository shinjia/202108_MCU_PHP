<?php
$height = isset($_POST['height']) ? $_POST['height'] : '';
$weight = isset($_POST['weight']) ? $_POST['weight'] : '';

$height = 0 + floatval($height);
$weight = 0 + floatval($weight);

if($height==0)
{
    // echo 'error 請<a href="input.php">回上頁</a>重新輸入';
    header('location: input.php?status=error&h='.$height.'&w='.$weight);
    exit;
}

// $bmi = $weight / ( ($height/100) * ($height/100) );
// $bmi = $weight / pow($height/100, 2);
$bmi = $weight / ($height/100) ** 2;

// $bmi = round($bmi, 2);
$bmi = number_format($bmi, 2);

if($bmi>=24)
{
    $msg = '月巴月半';
    $pic = 'images/s1.jpg';
    $url = 'page1.html';
}
elseif( $bmi>=22 && $bmi<24 )
{
    $msg = '過重';
    $pic = 'images/s2.jpg';
    $url = 'page2.html';
}
elseif( $bmi>=17.5 && $bmi<22 )
{
    $msg = '標準';
    $pic = 'images/s3.jpg';
    $url = 'page3.html';
}
elseif($bmi<17.5)
{
    $msg = '太輕';
    $pic = 'images/s4.jpg';
    $url = 'page4.html';
}
else
{
    $msg = '程式一定有錯！！！';
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
<h1>Hello World</h1>
<p>你的BMI值是 {$bmi}</p>
<p>{$msg}</p>
<p><img src="{$pic}"></p>
<p><a href="{$url}">建議</a></p>
<iframe src="{$url}" width="500" height="200"></iframe>
<hr>
<p>height: {$height}</p>
<p>weight: {$weight}</p>
</body>
</html>
HEREDOC;

echo $html;
?>
