<?php session_start();?>
<?php
header ("ContentType:text/html;charset=UTF-8");
	include("db/conn.php");
	$name=$_POST['name'];
	$password=$_POST['password'];//已经获取

		if($name&&$password)
		{	
			$sql="select * from user where name='$name' and password='$password'";
			$query = mysql_query($sql);
			if($result = mysql_fetch_array($query)) 
			{ 
				$_SESSION['name']=$name;
				echo "1";
			}		
			else {echo "0";}
		}


?>