<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="css/style.css" type="text/css" rel="stylesheet" />
	<title>"田园滋香"系列有机米溯源查询系统</title>
	<script type="text/javascript"> 
	if (screen.width < 800) 
	{ 
		document.write("<meta content='width=device-width, initial-scale=0.7, maximum-scale=1.0, user-scalable=0' name='viewport' />");
		
	}
	</script>
</head>
<body>
	<div id="all">
		<div id="head"><a href="index.php">"田园滋香"系列有机米溯源查询系统</a></div>
		<div id="menu">
			<ul>
				<a href="index.php"><li><b>首页</b></li></a>
				<a href="inquire.php"><li><b>登录</b></li></a>
				<a href="message_board.php"><li><b>留言板</b></li></a>
			</ul>
		</div>
	
		<div id="check">
	
			<form action="inquire.php" method="post" >
				<span id="check_title">请输入溯源号</span>
				<input id="text" type="text" name="check_num" value="<?php echo $check_num;?>"/>
				<input id="submit" type="submit" name="submit" value="查询" />
			</form>
				<?php 
				require_once 'function.php';
				if(!empty($_POST['check_num'])){
				$check_num=$_POST['check_num'];
				$b=1;
				}else{
					$check_num="";
					$b=0;
			}
			?>
		</div>
		<div id="<?php if($b) echo "info"  ?>">
			<div id="<?php if($b) echo "p"  ?>">
				<?php
					if($b){
						$text=check($check_num);
						echo "$text";
					}
					
				?>
			</div>
		
		</div>
		<div id="footer">
			<span>本系统由中山大学花都研究院设计</span>
		</div>
	</div>
</body>
</html>
<?php 
	include("db/conn.php");
	require_once 'function.php';
	if($_POST['submit']){
		if($_POST['check_num']){
			$check_num=$_POST['check_num'];
			$sql="select * from product_lookup where Product_number='$check_num'";
			$result = mysql_query($sql);
			if($row = mysql_fetch_array($result)) 
			{
				$date = date("Y-m-d h:m:s");
				$ip = $_SERVER['REMOTE_ADDR'];
 				if(isset($_SESSION['name'])){
					$name=$_SESSION['name'];
					$state="登录";
					$sql="insert into record (state,product_number,date,name,ip) values ('$state','$check_num','$date','$name','$ip')";
					$result = mysql_query($sql);
				}else{
					$state="未登录";
					$sql="insert into record (state,product_number,date,ip) values ('$state','$check_num','$date','$ip')";
					$result = mysql_query($sql);
				}			
			}
		}
	}
	

?>
