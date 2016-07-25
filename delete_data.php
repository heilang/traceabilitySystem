<?php session_start();?>
<?php 
$id=$_GET['id'];
$table=$_SESSION['tableName'];
include("db/conn.php");
$sql="delete  from  $table where Product_id ='$id'";
$result=mysql_query($sql);
if(empty($result))
{
$sql="delete  from  $table where id ='$id'";
mysql_query($sql);
}
?>
