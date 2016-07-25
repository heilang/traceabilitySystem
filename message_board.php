<?php session_start();?>
<?php
	if(!empty($_SESSION['name'])){
	$user=$_SESSION['name'];
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="css/message_board.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="js/ajax.js"></script>
	<title>"田园滋香"系列有机米溯源查询系统</title>
	<script type="text/javascript"> 
	if (screen.width < 800) 
	{ 
		document.write("<meta content='width=device-width, initial-scale=0.7, maximum-scale=1.0, user-scalable=0' name='viewport' />");
		
	}
	</script>
	<?php
	if(!isset($_SESSION['name'])){
	echo "<script language='javascript'>"; 
	echo "alert('请先登录！');";
	echo "location='in.php';"; 
	echo "</script>";
	}
	
?>
</head>
<body>
	
	<div id="all">
		<div id="head"><a href="index.php">"田园滋香"系列有机米溯源查询系统</a></div>
			<div id="menu">
				<?php
				$name=$_SESSION['name'];
				include("db/conn.php");
				$sql="select * from user where name='$name'";
				$query = mysql_query($sql);
				$result = mysql_fetch_array($query);	
				?>
			<ul>
				<li><a href="index.php"><b>首页</b></a></li>
				<li><a href="in.php"><b>登录</b></a></li>
				<li><a href="message_board.php?page=0"><b>留言板</b></a></li>
				<?php
				if($result[4]=='管理员')
				echo "<li><a href='bg_viewrecord.php?page=0'><b>记录</b></a></li>";
				?>
			</ul>
		</div>
		
		<div id="check">
			<!--<form action="function_1.php" method="post" >-->
				<span id="check_title">请输入</span>
				<input id="text" type="text" name="message"/>
				<input id="submit" type="submit"  value="留言" onclick="message()" />
			<!--</form>-->
			
		</div>
		<div id="info">
			<div id="p">
				<?php
					$page=0;
					include("db/conn.php");
					if(isset($_GET['page'])){
					$page = $_GET['page'];
					}
					$pages=0;
					$sql="select * from message_board";
					$result = mysql_query($sql);
					while($rs =mysql_fetch_array($result)){	
						global $pages;
						$pages = $pages+1;
					}		
					//$currentpage = page/10+1;
					$pages = ($pages-1)/10+1;
					$pages = floor($pages);
					$frontpage = $page-10;
					$nextpage = $page+10;
					if($frontpage<0){
						$frontpage=0;
					}
					if($nextpage<0){
						$nextpage=0;
					}
					if($nextpage>=$pages*10){
						$nextpage=($pages-1)*10;
					}
					$sql="select * from message_board order by id desc limit $page,10";				
					$query = mysql_query($sql);
					echo "<table>";
					echo "<tr>";
					echo "<td>&nbsp;<b>用户</b></td>";
					echo "<td>&nbsp;<b>内容</b></td>";
					echo "<td>&nbsp;<b>时间</b></td>";
					echo "</tr>";
					while($result =mysql_fetch_array($query))
						{	
							echo "<tr>";
							echo "<td>&nbsp;$result[3]</td>";
							echo "<td>&nbsp;$result[2]</td>";
							echo "<td>&nbsp;$result[1]</td>";
							
							
							echo "</tr>";
						
						}	
					echo "</table>";						
				?>
				
				<br/>
				<div align="center">第<?php echo "".($page/10+1);?>页</div>
				<div class="p_1"><a href="message_board.php?page=<?php echo $frontpage?>">上一页</a></div>			
				<?php
					$i=1;
					for(;$i<=$pages;$i++){
					$s=($i-1)*10;
					echo "<div class='p_2'>";					
					echo "<a href='message_board.php?page=$s'>$i</a>";
					echo "</div>";
					}	
				?>			
				<div class="p_1"><a href="message_board.php?page=<?php echo $nextpage?>">下一页</a></div>
			</div>
		</div>
			

		</div>
		<div id="footer">
			<span>本系统由中山大学花都研究院设计</span>
		</div>
	</div>
	
</body>
</html>
<script language="javascript">
function message()
{

	var message=document.getElementById("text").value;
if(message=="")
{
alert("请输入内容");
document.getElementById("text").focus();
}
else{
	//接收表单的URL地址
	var url = "function_1.php";
//var postStr="message="+message;
var postStr   = "message="+ message;
}
ajax_post(postStr,url);
	}
</script>