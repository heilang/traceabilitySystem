<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="css/register.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="js/jQuery-v1.8.3.js"></script>  
    <script type="text/javascript" src="js/jquery.validate.js"></script>  
	<title>"田园滋香"系列有机米溯源查询系统</title>
	<script type="text/javascript"> 
	if (screen.width < 800) 
	{ 
		document.write("<meta content='width=device-width, initial-scale=0.7, maximum-scale=1.0, user-scalable=0' name='viewport' />");
		
	}
	</script>
</head>
<body>
	<?php
	header ("ContentType:text/html;charset=utf-8");
	include("db/conn.php");
	$name=$_POST['name'];
	$password=$_POST['password'];
	$password2=$_POST['password2'];
	$mail=$_POST['mail'];
	if($_POST['submit'])
	{	
		$sql="select * from user where name='$name'";
		$result = mysql_query($sql);
		if($row = mysql_fetch_array($result)) 
		{
		echo "<script language=\"javascript\">alert(\"用户名已存在!\");location.href='register.php';</script>";
		return;
		}
		$sql="insert into user (name,password,mail,identity) values ('$name','$password','$mail','普通用户')";
		mysql_query($sql);
		echo "<script language=\"javascript\">alert(\"注册成功\");location.href='index.php';</script>";
	}
?>

	<div id="all">
		<div id="head"><a href="index.php">"田园滋香"系列有机米溯源查询系统</a></div>
		
			<div id="menu">
			<ul>
				<li><a href="index.php"><b>首页</b></a></li>
				<li><a href="in.php"><b>登录</b></a></li>
				<li><a href="message_board.php?page=0"><b>留言板</b></a></li>
			</ul>
			</div>
		<div id="info">
			<div id="content">
				<form action="" id="regq" name="reg" method="post" onsubmit="return CheckPost()">
					<div id="">
					用户名&nbsp;&nbsp;：<input type="text" name="name"/><br/><br/>
					密&nbsp;码&nbsp;&nbsp;&nbsp;：<input id="password" type="password" name="password"/><br/><br/>
					确认密码：<input type="password" id="password2" name="password2"/><br/><br/>
					电子邮箱：<input type="text" name="mail"/><br/><br/>
					</div>
					<div id="">
					<input id="submit" type="submit" name="submit" value="注册"/>
				
					</div>
			
				</form>
			</div>
	
	 <script type="text/javascript">  
       /*==========加载时执行的语句==========*/ 
       $(function()  
			{  
				$("#regq").validate(  
					{  
						errorClass: "error",  
					  
						rules: {  
						   //为name为email的控件添加两个验证方法:required()和email()  
								name:{required: true,rangelength:[3,15]},
								password:{required: true,minlength:6,maxlength:15},
								password2:{required: true,minlength:6,maxlength:15,equalTo:"#password"},
								mail:{required: true,email:true},
						},  
						
						messages: {  
						   //为name为email的控件的required()和email()验证方法设置验证失败的消息内容  
								name:{required:"用户名由3到15个字符组成", rangelength:"用户名由3到15个字符组成"},
								password:{required:"请输入密码",minlength:"由6位到15位字符组成",maxlength:"由6位到15位字符组成"},
								password2:{required:"请输入确认密码",minlength:"由6位到15位字符组成",maxlength:"由6位到15位字符组成",equalTo:"两次输入密码不一致"},
								mail:{required:"请输入正确的电子邮箱",email:"邮箱格式不对"},
						}  
					}
				);  
		    }
		);          
    </script> 
		</div>
		<div id="footer">
			<span>本系统由中山大学花都研究院设计</span>
		</div>
	</div>
</body>
</html>
