<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="css/bg_detilrecord.css" type="text/css" rel="stylesheet" />
	<title>"田园滋香"系列有机米溯源查询系统</title>
	<script type="text/javascript"> 
	if (screen.width < 800) 
	{ 
		document.write("<meta content='width=device-width, initial-scale=0.7, maximum-scale=1.0, user-scalable=0' name='viewport' />");
		
	}
	</script>
</head>
<body>
	<script type="text/javascript"> 
	</script>
	
	<div id="all">
		<div id="head"><a href="index.php">"田园滋香"系列有机米溯源查询系统</a></div>
		<div id="menu">
			<ul>
				<li><a href="index.php"><b>首页</b></a></li>
				<li><a href="in.php"><b>登录</b></a></li>
				<li><a href="message_board.php?page=0"><b>留言板</b></a></li>
				<li><a href='bg_viewrecord.php?page=0'><b>记录</b></a></li>
			</ul>
		</div>
		<?php 
				require_once 'function.php';
				if(!empty($_GET['product_number'])){
				$check_num=$_GET['product_number'];
				$b=1;
				}else{
					$check_num="";
					$b=0;
				}
		?>
		<div id="check">
			
				
			<form action="bg_detilrecord.php" method="get" >
				<span id="check_title">请输入溯源号</span>
				<input id="text" type="text" name="product_number" value="<?php if($b) echo $check_num;?>"/>
				<input type="hidden" name="page" value="0"/>
				<input id="submit" type="submit" name="submit" value="查询记录" />
			</form>
				
		</div>
		<div id="info">
			<div id="p">
				<br/>
				<?php					
							include("db/conn.php");							
							global $result2;
							
							$num=0;
							$page = $_GET['page'];
							$check_num = $_GET['product_number'];
							$pages=0;
							$sql="select * from record where product_number='$check_num'";	
							$result = mysql_query($sql);
							while($rs =mysql_fetch_array($result)){	
								$num=$num+1;
								global $pages;
								$pages = $pages+1;
							}		
							
							
							$currentpage = page/10+1;
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
							$sql="select * from record where product_number='$check_num' limit $page,10";				
							$result2 = mysql_query($sql);
							
							echo "<table>";
							echo "<tr>";
							echo "<td id='td_1'><b>用户名</b></td>";
							echo "<td id='td_2'><b>状态</b></td>";
							echo "<td id='td_3'><b>访问时间</b></td>";
							echo "<td id='td_3'><b>IP</b></td>";
							echo "</tr>";
							while($rss =mysql_fetch_array($result2))
								{	
								echo "<tr>";
								echo "<td id='td_1'>$rss[4]</td>";
								echo "<td id='td_2'>$rss[1]</td>";
								echo "<td id='td_3'>$rss[3]</td>";
								echo "<td id='td_3'>$rss[5]</td>";
								echo "</tr>";
								
								}	
							echo "</table>";	
							echo "访问总次数：$num;";
									
				?>
				<br/>
				<div align="center">第<?php echo "".($page/10+1);?>页</div>

				<div class="p_1"><a href="bg_detilrecord.php?page=<?php echo $frontpage?>&product_number=<?php echo $check_num?>">上一页</a></div>
				
					<?php
						$i=1;
						for(;$i<=$pages;$i++){
						$s=($i-1)*10;
						echo "<div class='p_2'><a>";					
						echo "<a href='bg_detilrecord.php?page=$s&product_number=$check_num'>$i</a>";
						echo "</a></div>";
						}	
					?>	
				
				<div class="p_1"><a href="bg_detilrecord.php?page=<?php echo $nextpage?>&product_number=<?php echo $check_num?>">下一页</a></div>
			</div>
		
		</div>
		<div id="footer">
			<span>本系统由中山大学花都研究院设计</span>
		</div>
	</div>
</body>
</html>