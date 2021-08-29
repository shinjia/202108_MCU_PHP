<?php
$nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';


// $filename = 'save/data.txt';
$filename = 'save/data_' . date('Ymd', time()) . '.txt';


$now = date('Y-m-d H:i:s', time());

$data = <<< HEREDOC
時間：{$now}
姓名：{$nickname}
內容：{$comment}
------------------------------------------

HEREDOC;

// 先確認檔案必須存在，若不在則先產生
if(!file_exists($filename))
{
    file_put_contents($filename, '');
}


$old = file_get_contents($filename);
$new = $data . $old;


file_put_contents($filename, $new);
// file_put_contents($filename, $data, FILE_APPEND);



// 寄出mail
// 注意，要在Apache裡設定php.ini中的SMTP及SMTP_FROM兩個參數
// mail('shinjia168@gmail.com', '有客戶留言', $data);   // 寄出通知

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
<p>{$nickname} 你好</p>
<p>已收到你的留言</p>

</body>
</html>
HEREDOC;

echo $html;
?>