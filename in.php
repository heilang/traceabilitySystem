<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="css/in.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="js/ajax.js"></script>
	<title>"田园滋香"系列有机米溯源查询系统</title>
	<script type="text/javascript"> 

	if (screen.width < 800) 
	{ 
		document.write("<meta content='width=device-width, initial-scale=0.7, maximum-scale=1.0, user-scalable=0' name='viewport' />");
		
	}	
	function jump(){
		location.href='register.php';
	}
	</script>

</head>
<body>

	<div id="all">
		<div id="head"><a href="index.php">"田园滋香"系列有机米溯源查询系统</a></div>
		
			<div id="menu">
				<?php
					if(!empty($_SESSION['name'])){
					$name=$_SESSION['name'];
					include("db/conn.php");
					$sql="select * from user where name='$name'";
					$query = mysql_query($sql);
					$result = mysql_fetch_array($query);
				}				
				?>
			<ul>
				<li><a href="index.php"><b>首页</b></a></li>
				<li><a href="in.php"><b>登录</b></a></li>
				<li><a href="message_board.php?page=0"><b>留言板</b></a></li>
				<?php
				if(!empty($_SESSION['name'])){
					if($result[4]=='管理员')
					echo "<li><a href='bg_viewrecord.php?page=0'><b>记录</b></a></li>";
				}
				?>
			</ul>
		</div>
		<div id="info">
		<?php
			if(!isset($_SESSION['name'])){
				echo "<div id='content'>";			
				echo "<div id='content_1'>";
				echo "用户名&nbsp;&nbsp;&nbsp;：<input type='text' id='name' /><br/><br/>";
				echo "密&nbsp;&nbsp;码&nbsp;&nbsp;&nbsp;：<input type='password' id='password'/><br/><br/>";
				echo "</div>";
				echo "<div id='content_2'>";
				echo "<input id='submit' type='submit' name='submit' value='登录' onclick='login()'/>";
				echo "<input id='submit' type='button' value='注册' onclick='jump()'/>";
				echo "</div>";
				echo "</div>";
			}else{
				$name=$_SESSION['name'];
				include("db/conn.php");
				$sql="select * from user where name='$name'";
				$query = mysql_query($sql);
				$result = mysql_fetch_array($query);	
				echo "<div id='content'>";
				//echo "<form action='login.php' name='login' method='post' onsubmit='return CheckPost()'>";
				echo "<div id='content_1'>";
				echo "<br/><br/>欢迎：$name";
				echo "<br/><br/>用户身份:$result[4]";
				echo "<br/><br/><a href='logout.php'>退出登录</a>";
				echo "</div>";
				echo"</div>";

			}
		?>
		
		</div>
		<div id="footer">
			<span>本系统由中山大学花都研究院设计</span>
		</div>
	</div>
</body>
</html>
<script language="javascript">
function login()
{

	var name=document.getElementById("name").value;
	var password=document.getElementById("password").value;
if(name=="")
{
alert("用户名不能为空");
document.getElementById("name").focus();
}
else
if(password=="")
{
alert("密码不能为空");
document.getElementById("password").focus();
}
else{
	//接收表单的URL地址
	var url = "login.php";

	//需要POST的值，把每个变量都通过&来联接
	var postStr   = "name="+ name +"&password="+ password;

	//实例化Ajax
	//var ajax = InitAjax();
}
ajax_post(postStr,url);
	}
</script>
