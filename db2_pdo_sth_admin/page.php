<?php
session_start();

$ss_usertype = isset($_SESSION["usertype"]) ? $_SESSION["usertype"] : "";
$ss_usercode = isset($_SESSION["usercode"]) ? $_SESSION["usercode"] : "";


if($ss_usertype!="ADMIN")
{
   header("Location: error.php");
   exit;
}



include 'utility.php';

$code = isset($_GET['code']) ? $_GET['code'] : 'error';

// 參數定義，可依需要自行修改
$path = 'data/';   // 存放網頁內容的資料夾
$filename = $path . $code . '.html';  // 規定副檔案為 .html

if(file_exists($filename))
{
   $html = join ('', file($filename));   // 讀取檔案內容並組成文字串
}
else
{
	 // 找不到檔案時的顯示訊息
   $html = error_message('page', $code);
}

include 'pagemake.php';
pagemake($html, '');
?>