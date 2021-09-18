<?php
session_start();

$ss_usertype = isset($_SESSION["usertype"]) ? $_SESSION["usertype"] : "";
$ss_usercode = isset($_SESSION["usercode"]) ? $_SESSION["usercode"] : "";


if($ss_usertype!="ADMIN")
{
   header("Location: error.php");
   exit;
}




$html = <<< HEREDOC
<button onclick="history.back();">返回</button>
<h2>查詢資料</h2>
<form action="find_x.php" method="post">
   <p>查詢名字內含字：<input type="text" name="key"></p>
   <p><input type="submit" value="查詢"></p>
</form>
HEREDOC;

include 'pagemake.php';
pagemake($html, '');
?>