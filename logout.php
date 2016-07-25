<?php session_start();?>
<?php
	header ("ContentType:text/html;charset=utf-8");
	session_destroy();
	echo "<script language='javascript'>"; 
	echo "location='in.php';"; 
	echo "</script>";
?>