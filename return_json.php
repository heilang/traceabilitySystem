<?php
header ("ContentType:text/html;charset=utf-8");
$check_num=$_GET['check_num'];
require_once 'function.php';
				if(!empty($check_num)){
					$text=check($check_num);
					if($text=="尊敬的客户，您所输入的产品信息在系统中查找不到，请确认后重新输入。")
					echo "0";//如果查询号码不存在则返回值是0。
					else//如果查询码有效，则查询完毕并返回JSON格式的string
					{

 echo to_json($check_num,$text);
					}
				}
				else
				echo "0";

		    function to_json($item1,$item2) {
        //url编码,避免json_encode将中文转为unicode
        $item2 = urlencode($item2);
		$array=array('check_num'=>$item1,'text'=>$item2);
        $str_json = json_encode($array);
        //url解码,转完json后将各属性返回,确保对象属性不变
        $item2 = urldecode($str_json);
        return urldecode($item2);
    
 }

?>
