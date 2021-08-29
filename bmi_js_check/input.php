<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Title of the document</title>

</head>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Title of the document</title>

</head>
<body>
<h1>BMI</h1>
<p>檢測你的身體質量指數</p>
<form id="form1" method="post" action="calc.php">
<p>身高：<input type="text" id="height" name="height" size="4"> 公分</p>
<p>體重：<input type="text" id="weight" name="weight" size="4"> 公斤</p>
<p><input type="submit" value="計算 BMI"></p>
</form>

<script type="text/javascript">
document.getElementById('form1').onsubmit = function(){ return check_data(); };

function check_data()
{
    var flag = true;
    var message = '';

    // ---------- Check 1 ----------
    // 檢查身高 (文字欄位必須有值)
    var t = document.getElementById('height');
    if(t.value=='' || isNaN(t.value) || (t.value==0))
    {
        flag = false;
        message += '(1) 身高不正確\n';
    }
    
    // ---------- Check 2 ----------
    // 檢查體重 (文字欄位必須有值)
    var t = document.getElementById('weight');
    if(t.value=='' || isNaN(t.value))
    {
        flag = false;
        message += '(2) 體重不正確\n';
    }

    // 最後處理
    if(!flag) 
    {
        alert(message);
    }

    return flag;
}
</script>

</body>
</html>
