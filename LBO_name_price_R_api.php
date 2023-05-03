<?php
 require_once("LBOdbtool.php");
 $conn = create_connect();

//建立mysql執行的指令

$sql = "SELECT lunch_name1, lunch_name2,price_1,price_2,date,Date FROM lunch_name";
$result =execute_sql($conn,"id19291385_memberdb",$sql);




if(mysqli_num_rows($result) > 0){
  $mydata = array();

  while($row = mysqli_fetch_assoc($result)){
  
    $mydata [] = $row;
  
  }
 echo '{"state" : true, "data":'.json_encode($mydata).',"message" : "資料讀取成功!" }';
}else{
 echo '{"state" : false, "message" : "讀取資料失敗" }';
 
}
// echo json_encode($mydata);
mysqli_close($conn);

?>