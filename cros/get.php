<?php
$url = isset($_GET['url']) ? $_GET['url'] : '';

// 設置允許其他域名訪問
header('Access-Control-Allow-Origin:*');  
// 設置允許的響應類型
header('Access-Control-Allow-Methods:POST, GET');  
// 設置允許的響應頭
header('Access-Control-Allow-Headers:x-requested-with,content-type'); 

if(!empty($url))
{
   echo file_get_contents($url);
}
else
{
   echo 'no url';
}
?>