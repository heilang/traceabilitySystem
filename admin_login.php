<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap/css/bootstrap.css"/>
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript" src="js/admin_login.js"></script>
<script language="javascript" src="js/ajax.js"></script>
<title>
有机米溯源管理系统
</title>
</head>
<body style="background:#b4a6b7;">

 <div id="idwrong" style="font-size:20px;margin:240px 810px;text-align:center;color:red;position:absolute;width:35px;height:35px;z-index:2;"></div>
<div id="passwordwrong" style="font-size:20px;margin:305px 810px;text-align:center;color:red;position:absolute;width:35px;height:35px;z-index:2;"></div>
<div id="loginmiddle">

<br/>
<div style="margin:80px 45px;position:absolute;">
  <input type="text" id="user"  Onblur="checkID()" class="input-medium search-query" style='border-color:"#7e975a"' name="username"/>
  <br/><br/><br/>
  <input type="password"  id="password" Onblur="checkPassword()" class="input-medium search-query" name="password"/><br/><br/>

   <input  style="margin-left:30px;width:160px;height:35px;" type="submit" value="登录" class="btn btn-success" onclick="go_admin()"/>
</div>
</div>
</body>
</html>
<script language="javascript">
function go_admin()
{
if(idok==true&&passwordok==true)
{
var userid=document.getElementById("user").value;
//alert(userid);
var postStr="name="+userid;
var url="check_admin.php";
ajax_post(postStr,url);
}
else
alert("请填写账号密码");
}
</script>