<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>"田园滋香"系列有机米溯源查询系统</title>
	<link href='css/index.css'  type='text/css' rel='stylesheet' />
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
		<?php 
				require_once 'function.php';
				if(!empty($_GET['check_num'])){
				$check_num=$_GET['check_num'];
				$b=1;
				}else{
					$check_num="";
					$b=0;
				}
		?>
		<div id="check">
			
				
			<form action="index.php" method="GET" >
				<span id="check_title">请输入溯源号</span>
				<input id="text" type="text" name="check_num" value="<?php if($b) echo $check_num;?>"/>
				<input id="submit" type="submit" value="查询" />
			</form>
				
		</div>
		<div id="<?php if($b) echo "info"  ?>">
			<div id="<?php if($b) echo "p"  ?>">
				<?php
					if($b){
						$text=check($check_num);
						//$array=array('check_num'=>$check_num,'text'=>$text);
						//$jsona=json_encode($array);
						//echo $jsona;	//将数组形式的数据转换成JSON格式，其内容只有两个，{check_num: ;text: ;}
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
	
		if($_GET['check_num']){
			$check_num=$_GET['check_num'];
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
	
?>
