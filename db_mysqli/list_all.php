<?php
include 'config.php';

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'DEFAULT';

$sql_sort = " ORDER BY ";
switch($sort)
{
   case 'USERNAME' : 
        $sql_sort .= 'username';
        break;
        
   case 'HEIGHT' : 
      $sql_sort .= 'height';
      break;
      
   case 'WEIGHT' : 
      $sql_sort .= 'weight';
      break;

   default:
      $sql_sort .= ' uid';
}

// 連接資料庫
$link = db_open();


$sqlstr = "SELECT * FROM person " . $sql_sort;

$result = mysqli_query($link, $sqlstr);

$total_rec = mysqli_num_rows($result);  // SQL影響了幾筆記錄

/*
$a_fields = array(
'usercode'=>'代碼',
'username'=>'名稱')
*/

// 提取欄位名稱
$finfo = mysqli_fetch_fields($result);
$field = '';
foreach ($finfo as $val)
{
   //printf ("Name:%s \n", $val->name);
   //printf ("Table:%s \n", $val->table);
   //printf ("max. Len:%d \n", $val->max_length);
   //printf ("Flags:%d \n", $val->flags);
   //printf ("Type:%d \n\n" , $val->type);
   $field .= '<th>' . $val->name . '</th>';
}

$data = '';
while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
{
   $uid      = $row['uid'];
   $usercode = $row['usercode'];
   $username = $row['username'];
   $address  = $row['address'];
   $birthday = $row['birthday'];
   $height   = $row['height'];
   $weight   = $row['weight'];
   $remark   = $row['remark'];
   
   // 依需要調整顯示內容
   $str_birthday = date('Y-m-d', strtotime($birthday));
   
   // 照片處理
   $img_show = '';
   $img_file = 'file/'. $remark;
   
   if(file_exists($img_file))
   {
      $img_show = '<img src="' . $img_file . '" width="100">';
   }
   else
   {
      $img_show = '<a href="upload.php?uid=' . $uid . '}">上傳照片</a>';
   }
   
   $data .= <<< HEREDOC
   <tr>
     <td>{$uid}</td>
     <td>{$usercode}</td>
     <td>{$username}</td>
     <td>{$address}</td>
     <td>{$str_birthday}</td>
     <td>{$height}</td>
     <td>{$weight}</td>
     <td>{$remark}{$img_show}</td>
     <td><a href="display.php?uid={$uid}">詳細</a></td>
     <td><a href="edit.php?uid={$uid}">修改</a></td>
     <td><a href="upload.php?uid={$uid}">上傳照片</a></td>
     <td><a href="delete.php?uid={$uid}" onclick="return confirm('確定要刪除嗎？');">刪除</a></td>
   </tr>
HEREDOC;
}

db_close($link);



$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>基本資料庫系統</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<p><a href="index.php">回首頁</a></p>
<p><a href="?sort=USERNAME">姓名</a> | <a href="?sort=HEIGHT">身高</a>| <a href="?sort=WEIGHT">體重</a> |</p>
<h2 align="center" align="center">共有 {$total_rec} 筆記錄</h2>
<table border="1" align="center">
   <tr>
   {$field}
   </tr>
   <tr>
      <th>序號</th>
      <th>代碼</th>
      <th>姓名</th>
      <th>地址</th>
      <th>生日</th>
      <th>身高</th>
      <th>體重</th>
      <th>備註</th>
      <td colspan="4" align="center">操作 [<a href="add.php">新增記錄</a>]</td>
   </tr>
{$data}
</table>

</body>
</html>
HEREDOC;

echo $html;
?>