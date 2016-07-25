<?php session_start();
if(!isset($_SESSION['admin_name']))
echo "<script lanuage=\"javascript\">location.href=\"admin_login.php\"</script>";
?>
<?php include("db/conn.php");
?>
<html>

<frameset cols="32%,*" frameborder="0" border="0" >
  <frame src="admin_left.php" name="left"/>
  <frame src="admin_right.php" name="right"/>

</frameset>

</html>