
<?php
		header ("ContentType:text/html;charset=utf-8");
		$arr_top="GDTL1201";
		$arr_bottom="";
		$Product_number="";
		$link=mysql_connect("localhost","root","111111") or die(mysql_error());

		mysql_select_db("origanin_rice");
		
		for($i=1;$i<=14134;$i+=7){
			$arr_bottom="000000".$i;
			$arr_bottom=substr($arr_bottom,-5);
			$Product_number=$arr_top.$arr_bottom;
			$sql="insert into product_lookup(Product_number)values('$Product_number')";
			$query=mysql_query($sql);
		}	
?>