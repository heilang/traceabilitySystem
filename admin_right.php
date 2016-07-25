<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link href="bootstrap/bootstrap/css/bootstrap.css" rel="stylesheet"/>
<link href="bootstrap/bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
<script src="bootstrap/bootstrap/js/bootstrap.js"></script>
<script src="js/found_table.js"></script>
<script src="js/ajax.js"></script>
<style type="text/css">
*{margin:0;padding:0;}
body
{background:#CCCCCC;}
</style>
</head>
<body >
<div id="welcome" style=" width:500px;height:40px;margin:30px 0 10px 50px;"><h1><font color="blue"><?php echo $_SESSION['admin_name'];?>,欢迎登录有机米溯源管理系统!</font><h1></div>
<div style="position:relative;">
<div id="right" style="width:800px;height:400px;position:absolute;margin:100px 0 0 0px;">
<table class="table table-bordered">
<?php 
if(!empty($_GET['tableName']))
$_SESSION['tableName']=$_GET['tableName'];
$tableName=$_SESSION['tableName'];
include("db/conn.php");
$pages=0;//表中的记录条数
$sql="select*from $tableName";
$query=mysql_query($sql);
while($result=mysql_fetch_array($query))
$pages++;
$current_page=$_GET['current_page'];

if(empty($current_page))
{
$current_page=1;
}
$page=($current_page-1)*10;
$sql="select*from $tableName limit $page,10";
$query = mysql_query($sql);
if($tableName=="user")
{
echo "<tr><thead>";
					echo "<td><b>id</b></td>";
					echo "<td><b>name</b></td>";					
					echo "<td><b>password</b></td>";
					echo "<td><b>email</b></td>";
					echo "<td><b>identity</b></td>";	
					echo "<td><b>delete</b></td>";	
					echo "</thead></tr>";
					while($result =mysql_fetch_array($query))
						{
						//$pages++;
							echo "<tr>";
							for($i=0;$i<5;$i++)
							echo "<td>$result[$i]</td>";
							echo "<td ><button type=\"button\" class=\"btn btn-primary\" onclick=\"delect(this)\">删除</button></td>";
							echo "</tr>";
							}
					
							echo "<tr  >";
							echo "<td></td>";
						for($i=0;$i<3;$i++)
							echo "<td><input name=\"view\" disabled type=\"text\" style=\"width:170px;\"/></td>";
							echo "<td><select name=\"view\" disabled class=\"form-control\" style=\"width:100px;\">  
							<option>普通用户</option>
							<option>管理员</option>
							</select></td>";
							echo "<td><button type=\"button\" class=\"btn btn-primary\" onclick=\"drop()\">清空</button></td>";
							echo "</tr>";
							
							}
				
else if($tableName=="record")
							{
					echo "<tr><thead>";
					echo "<td><b>id</b></td>";
					echo "<td><b>state</b></td>";					
					echo "<td><b>product_number</b></td>";
					echo "<td><b>date</b></td>";
					echo "<td><b>name</b></td>";
					echo "<td><b>ip</b></td>";
					echo "<td><b>delete</b></td>";	
					echo "</thead></tr>";
					while($result =mysql_fetch_array($query))
						{	
							echo "<tr>";
							for($i=0;$i<6;$i++)
							echo "<td>$result[$i]</td>";
							echo "<td ><button type=\"button\" class=\"btn btn-primary\" onclick=\"delect(this)\">删除</button></td>";
							echo "</tr>";}

}	
else if($tableName=="message_board")
{

echo "<tr><thead>";
					echo "<td><b>id</b></td>";
					echo "<td><b>date</b></td>";					
					echo "<td><b>message</b></td>";
					echo "<td><b>user</b></td>";
					echo "<td><b>delete</b></td>";	
					echo "</thead></tr>";
					while($result =mysql_fetch_array($query))
						{	//$pages++;
							echo "<tr>";
							for($i=0;$i<4;$i++)
							echo "<td>$result[$i]</td>";
				echo "<td ><button type=\"button\" class=\"btn btn-primary\" onclick=\"delect(this)\">删除</button></td>";
							echo "</tr>";}

}
else if($tableName=="product_lookup")
{

echo "<tr><thead>";
					echo "<td><b>product_id</b></td>";
					echo "<td><b>product_number</b></td>";
echo "<td><b>delete</b></td>";					
					echo "</thead></tr>";
					while($result =mysql_fetch_array($query))
						{	//$pages++;
						//echo $pages;
							echo "<tr>";
						for($i=0;$i<2;$i++)
							echo "<td>$result[$i]</td>";
							echo "<td ><button type=\"button\" class=\"btn btn-primary\" onclick=\"delect(this)\">删除</button></td>";
							echo "</tr>";
							
							}
						
							echo "<tr>";
							echo "<td></td>";
							echo "<td><input name=\"view\" disabled type=\"text\" style=\"width:200px;\"/></td>";
							echo "<td ><button type=\"button\" class=\"btn btn-primary\" onclick=\"drop()\">清空</button></td>";
							echo "</tr>";	
			
}				
					
?></table>
<button type="button" class="btn btn-primary" onclick="show()">插入数据</button>
<button type="button" class="btn btn-primary" onclick="check_isset()">&nbsp;&nbsp;&nbsp;&nbsp;确定&nbsp;&nbsp;&nbsp;&nbsp;</button>
<ul class="pagination"style="margin-left:180px;">
<?php  $i=1;
$all_page=floor(($pages-1)/10+1);
			echo	"<li><a href=\"admin_right.php?current_page=1\">&laquo;</a></li>";
			for($i;$i<=floor(($pages-1)/10+1);$i++)
			{$s=$i;
			if($i<=10)
			echo 	"<li><a href=\"admin_right.php?current_page=$s\">".$i."</a></li>";
			else 
			echo  "<li><a name=\"list\" style=\"display:none;\" href=\"admin_right.php?current_page=$s\">".$i."</a></li>";
			
			
			}
			if($all_page>10)
			echo "<li><a href=\"#\" onclick=\"show_list()\">...</a></li>";
			echo 	"<li><a href=\"admin_right.php?current_page=$all_page\">&raquo;</a></li>";?>
</ul>

</div>
</div>

</body>

</html>
<script language="javascript">
function delect(node)
{

var id=node.parentNode.parentNode.childNodes[0].childNodes[0].nodeValue;
url="delete_data.php?id="+id;
ajax_get(url);
location.reload();

}
function show()
{
var tableName="<?php $tableName=$_SESSION['tableName']; echo $tableName;?>";
if(tableName=="record"||tableName=="message_board")
{
alert("该表不允许插入数据");
exit(0);
}
var result=document.getElementsByName("view");
var i=0;
while(result[i]!="")
{
result[i].removeAttribute("disabled"); 
i++;}


}
function show_list()
{
var result=document.getElementsByName("list");
var i=0;
while(result[i]!="")
{
result[i].style.display="block"; 
i++;}

}
function drop()
{

/**/
var result=document.getElementsByName("view");
var i=0;
while(result[i]!="")
{
result[i].value=""; 
i++;}
}



function check_isset()
{
var result=document.getElementsByName("view");
var i=0;
while(result[i]!="")
{
if(result[i].value=="") 
{
alert("数据不完整");
exit(0);
}
else
{
if(result[i+1]==null)
{
//alert("成功");//这里设置上传数据
var url="insert.php";
var tableName="<?php $tableName=$_SESSION['tableName']; echo $tableName;?>";
if(tableName=="user")
var postr="name="+result[0].value+"&password="+result[1].value+"&email="+result[2].value+"&identity="+result[3].value;
else 
if(tableName=="product_lookup")
var postr="product_number="+result[0].value;
ajax_post(postr,url);
}
i++;
}
}

}
</script>

