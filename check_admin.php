<?php session_start();?>
<?php
header ("ContentType:text/html;charset=UTF-8");

	$name=$_POST['name'];
if(!empty($name))
{
$_SESSION['admin_name']=$name;
echo "admin_ok";
}
else
echo "admin_false";

?>