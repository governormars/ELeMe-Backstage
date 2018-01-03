<?php

header("Content-type:text/html;charset=utf-8");//字符编码设置

error_reporting(E_ALL ^ E_NOTICE);

$conn = mysqli_connect("127.0.0.1", "root", "123456", "eleme");

$userid = $_POST['userid'];//用户ID

$resname = $_POST['resname'];//餐馆名字

$ordersum = $_POST['ordersum'];//总价格

$disname = $_POST['disname'];//菜名

//$id = $_GET['userid'];//get userid
//插入订单数据
$sql1 = "insert into orders(res_name,order_sum,user_id,dis_name) values('$resname',
'$ordersum','$userid','$disname')";
$result1 = $conn->query($sql1);
if($result1) {
   echo 'success!';
}
$sql3 = "UPDATE orders SET order_pic=(select res_picture from restaurant where
  res_name = '$resname') where res_name = '$resname'";
$result3 = $conn->query($sql3);
//返回订单(餐馆名字，菜品名字，总金额)
//$sql2 = "select * from orders where user_id={$id} order by order_id";
// $result = $conn->query($sql2);
// if($result1) {
//   echo 'success!';
// }
// $json = array();
// if($result) {
// 	while($rows=mysqli_fetch_array($result,MYSQL_ASSOC)) {
// 		$count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小
//     	for($i=0;$i<$count;$i++){
//         	unset($rows[$i]);//删除冗余数据
//     	}
//     	array_push($json,$rows);
// 	}
// }
//
// $str=json_encode($json);
// $real_str=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $str);
//
// echo stripslashes($real_str);
