<?php session_start();?>
<?php
include("db/conn.php");
$table=$_SESSION['tableName'];
if($table=="user")
{
$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];
$identity=$_POST['identity'];
$sql="insert into $table(name,password,mail,identity)value('$name','$password','$email','$identity')";
//echo $sql;
}
else
if($table=="product_lookup")
{$product_number=$_POST['product_number'];
$sql="insert into $table(Product_number)value('$product_number')";
//echo $sql;
}
$query=mysql_query($sql);
if(!empty($query))
echo "inser_sucess";
//echo $table;

 ?>