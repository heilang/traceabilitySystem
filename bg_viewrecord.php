<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="css/bg_viewrecord.css" type="text/css" rel="stylesheet" />
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
		<div id="info">
		
			<div id="p">
				<br/>
				<?php
					include("db/conn.php");
					$page = $_GET['page'];
					$pages=0;
					$sql="select * from record ORDER BY  `record`.`date` DESC";
					$result = mysql_query($sql);
					while($rs =mysql_fetch_array($result)){	
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

					$sql="select * from record limit $page,10";				
					$result = mysql_query($sql);
					echo "<table>";
					echo "<tr>";
					echo "<td id='td_1'><b>溯源号</b></td>";
					echo "<td id='td_2'><b>IP地址</b></td>";
					echo "<td id='td_3'><b>用户名</b></td>";
					echo "</tr>";
					while($rs =mysql_fetch_array($result))
						{	
						echo "<tr>";
						echo "<td id='td_1'><a id='p_a' href='bg_detilrecord.php?product_number=$rs[2]&page=0'>$rs[2]</a></td>";
						echo "<td id='td_2'>$rs[5]&nbsp;&nbsp;&nbsp;</td>";
						echo "<td id='td_3'>$rs[4]&nbsp;&nbsp;&nbsp;</td>";
						echo "</tr>";
						
						}	
					echo "</table>";						
				?>
				
				<br/>
				<div align="center">第<?php echo "".($page/10+1);?>页</div>
				<div class="p_1"><a href="bg_viewrecord.php?page=<?php echo $frontpage?>">上一页</a></div>			
				<?php
					$i=1;
					for(;$i<=$pages;$i++){
					$s=($i-1)*10;
					echo "<div class='p_2'>";					
					echo "<a href='bg_viewrecord.php?page=$s'>$i</a>";
					echo "</div>";
					}	
				?>			
				<div class="p_1"><a href="bg_viewrecord.php?page=<?php echo $nextpage?>">下一页</a></div>
			</div>
		</div>
				
		<div id="footer">
			<span>本系统由中山大学花都研究院设计</span>
		</div>
	</div>	

</body>
</html>