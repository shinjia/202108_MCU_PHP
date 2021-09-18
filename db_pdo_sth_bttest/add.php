<?php

$html = <<< HEREDOC
<button onclick="history.back();" class="btn btn-info">返回</button>
<h2>新增資料</h2>

<form>
  <div class="mb-3">
    <label for="usercode" class="form-label">代碼</label>
    <input type="text" class="form-control" id="usercode" name="usercode" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">姓名</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<form action="add_save.php" method="post">
<table >
   <tr><th>代碼</th><td><input type="text" name="usercode" value=''></td></tr>
   <tr><th>姓名</th><td><input type="text" name="username" value=''></td></tr>
   <tr><th>地址</th><td><input type="text" name="address"  value=''></td></tr>
   <tr><th>生日</th><td><input type="text" name="birthday" value=''></td></tr>
   <tr><th>身高</th><td><input type="text" name="height"   value=''></td></tr>
   <tr><th>體重</th><td><input type="text" name="weight"   value=''></td></tr>
   <tr><th>備註</th><td><input type="text" name="remark"   value=''></td></tr>
</table>
<p><input type="submit" value="新增"></p>
</form>
HEREDOC;

include 'pagemake.php';
pagemake($html, '');
?>