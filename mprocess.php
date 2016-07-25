<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link href="css/moblie.css" type="text/css" rel="stylesheet" />
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
		<div id="check">
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
			<form action="mprocess.php" method="post" >
				<span id="check_title">请输入溯源号</span>
				<input id="text" type="text" name="check_num" value="<?php echo $check_num;?>"/>
				<input id="submit" type="submit" value="查询" />
			</form>
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