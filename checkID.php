<?php session_start();?>
<?php
$name=$_GET['username'];
include("db/conn.php");
if(!empty($name))
{
			$sql="select * from user where name='$name'";
			$query = mysql_query($sql);
			$row=mysql_fetch_array($query);
			if($name==$row[1]&&$row[4]=="管理员") 
			{ 
				
				echo "1";
			}		
			else {echo "0";}
}

?>