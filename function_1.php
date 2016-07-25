<?php session_start();?>
<?php
	header ("ContentType:text/html;charset=utf-8");
		@$message=$_POST['message'];
		date_default_timezone_set("Asia/ShangHai");
		$date=date('Y-m-d H:i:s',time());
		include("db/conn.php");
		$user=$_SESSION['name'];
	
		//echo $user;
		/**/if(!Empty($message)&&!Empty($user))
		{			
			$sql="insert into message_board(date,message,user)value('$date','$message','$user')";
			$query=mysql_query($sql);
			echo "11";
			
		}
			else
			echo "10";
			
		
?>