<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link href="bootstrap/bootstrap/css/bootstrap.css" rel="stylesheet"/>
<script src="bootstrap/bootstrap/js/bootstrap.js"></script>
<script src="js/found_table.js"></script>
<script src="js/ajax.js"></script>
<style type="text/css">
*{margin:0;padding:0;}
body
{background:#CCCCCC;}
</style>
</head>
<body>



<div style="position:relative;">
<div  id="left" style="width:200px;height:132px;margin:180px 60px 0 180px;position:absolute;">
<ul class="nav nav-pills nav-stacked" style="max-width:300px;">
 <li class="active" onclick="change(this)" id="user"><a onclick="table(this)">user</a></li>
  <li  onclick="change(this)" id="record"><a  onclick="table(this)">record</a></li>
  <li   onclick="change(this)" id="message_board"><a  onclick="table(this)">message_board</a></li>
  <li   onclick="change(this)" id="product_lookup"><a onclick="table(this)" >product_lookup</a></li>
</ul>
</div>

</div>

</body>

</html>
<script language="javascript">
function table(node)
{
var tableName=node.childNodes[0].nodeValue;
var url="admin_right.php?tableName="+tableName;
ajax_get(url);
window.parent.frames[1].location.reload();

}
</script>


