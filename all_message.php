<?php
header ("ContentType:text/html;charset=utf-8");
include("db/conn.php");
$sql="select * from message_board order by id desc";
		$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
  {
 
 echo "用户:".$row['user'];
  echo "留言:".$row['message'];
echo "日期:".$row['date'];
echo "<br/>";

  }


?>