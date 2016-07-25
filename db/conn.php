<?php
	error_reporting(E_ALL^E_NOTICE^E_WARNING);
	$conn = @mysql_connect("localhost","dbsysung","sysung101010") or die("数据库连接失败");
	mysql_select_db("dbsysung",$conn);
	mysql_query("set names 'utf8'");
?>