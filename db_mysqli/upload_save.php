<?php
include 'config.php';

$uid  = isset($_POST['uid']) ? $_POST['uid'] : '';

$a_file = $_FILES["file"];  // 上傳的檔案內容


// part 1：檔案上傳
$path = "file/";  // 指定存檔的資料夾

// 判斷能否存入，若無則建立新的資料夾
if(!is_dir($path))
{
   mkdir($path);
   // chmod($path, 777);
}

// 上傳檔案處理
$msg = '';
if($a_file["size"]>0)
{
   $save_filename = $path . $a_file["name"];  // 保留原來檔名
   $save_filename = iconv("utf-8", "big5", $save_filename);   // 處理中文檔名時需轉換

   move_uploaded_file($a_file["tmp_name"], $save_filename);

   $msg .= '<p>已成功上傳檔案：' . $a_file["name"] . '</p>';
   $msg .= '<BLOCKQUOTE>';
   $msg .= '儲存檔名：' . $save_filename      . '<BR>';
   $msg .= '原始檔名：' . $a_file["name"]     . '<BR>';
   $msg .= '檔案大小：' . $a_file["size"]     . '<BR>';
   $msg .= '檔案類型：' . $a_file["type"]     . '<BR>';
   $msg .= '暫存檔案：' . $a_file["tmp_name"] . '<BR>';
   $msg .= '</BLOCKQUOTE>';
}
else
{
   $msg .= '檔案上傳不成功！';
}


// part2: 修改欄位

// 連接資料庫
$link = db_open();

$sqlstr  = "UPDATE person SET ";
$sqlstr .= "remark  ='" . $a_file["name"] . "' ";  // 注意最後欄位沒有逗號
$sqlstr .= "WHERE uid=" . $uid;
echo $sqlstr;

if(mysqli_query($link, $sqlstr))
{
   $msg = '資料已修改完畢!!!!!!!!';
   $msg .= '<br><a href="display.php?uid=' . $uid . '">詳細</a>';
}
else
{
   $msg = '資料無法修改!!!!!!!';
   $msg .= '<hr>' . $sqlstr . '<hr>' . mysqli_error($link);
}

db_close($link);

$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>檔案上傳</title>
</head>
<body>
<p><a href="upload_input.php">回前頁</a></p>
{$msg}
<hr>
<p>請注意讓使用者任意上傳檔案而未加控制，將有可能造成系統的漏洞，導致被入侵的危險。</p>
</body>
</html>
HEREDOC;

echo $html;
?>