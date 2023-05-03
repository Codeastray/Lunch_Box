<?php
$data = file_get_contents("php://input",'r');
$mydata = array();
$mydata = json_decode($data, true);

 require_once("LBOdbtool.php");
 $conn = create_connect();
 

 $lunch_1_number = $mydata["lunch_1_number"];
 $lunch_2_number = $mydata["lunch_2_number"];

 $sql = "SELECT COUNT(No_1_dish) FROM order_meal WHERE No_1_dish LIKE '%$lunch_1_number%'";
 $result1 = execute_sql($conn, "lunchbox", $sql);
 
 $sql = "SELECT COUNT(No_1_dish) FROM order_meal WHERE No_1_dish LIKE '%$lunch_2_number%'";
 $result2 = execute_sql($conn, "lunchbox", $sql);
if(mysqli_num_rows($result2) > 0){



  $mydata = array();

 
  
    $mydata[] =mysqli_fetch_assoc($result1);
    $mydata[] =mysqli_fetch_assoc($result2);
  
  




 echo '{"state" : true, "data":'.json_encode($mydata).',"message" : "資料讀取成功!" }';
}else{
 echo '{"state" : false, "message" : "讀取資料失敗" }';
 
}
// echo json_encode($mydata);
mysqli_close($conn);
