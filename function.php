<?php
header ("ContentType:text/html;charset=utf-8");
	function check($check_num){
		include("db/conn.php");
		$sql="select * from product_lookup where Product_number='$check_num'";
		$result = mysql_query($sql);
		$rs =mysql_fetch_array($result);
		if($rs[1]!=""){
			return "顾客您好!您输入的产品溯源号是$check_num.<br/>感谢选择广东田联'田园滋香'有机米.<br/>本盒批次号2012010101,土地编号01,46.3亩.<br/>负责人:禤祥福.<br/>种植时间：20120601-20120908,加工日期：20120914,包装日期：20120916.<br/>质检员：邓传英。<br/>经检测,本批次全部合格.<br/>详情请登陆:<a href='http://www.gdtlzy.com' target='_blank'>www.gdtlzy.com</a>。<br/>信息发布：中山大学生命科学学院、中山大学花都研究院.";
		}else{
			return "尊敬的客户，您所输入的产品信息在系统中查找不到，请确认后重新输入。";
		}
	}
?>
