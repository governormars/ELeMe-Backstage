<?php

header("Content-type:text/html;charset=utf-8");//字符编码设置

error_reporting(E_ALL ^ E_NOTICE);

$conn = mysqli_connect("127.0.0.1", "root", "123456", "eleme");

$id=$_GET["id"];

$sql = "select * from dishes where res_id='$id'";
$result = $conn->query($sql);

$json = array();
if($result) {
	while($rows=mysqli_fetch_array($result,MYSQL_ASSOC)) {
		$count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小
    	for($i=0;$i<$count;$i++){
        	unset($rows[$i]);//删除冗余数据
    	}
    	array_push($json,$rows);
	}
}

$str=json_encode($json);
$real_str=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $str);

echo stripslashes($real_str);
