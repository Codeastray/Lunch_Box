<?php
 require_once("LBOdbtool.php");
 $conn = create_connect();

//建立mysql執行的指令

$sql = "SELECT student_ID, No_1_dish,No_2_dish,PS FROM order_meal";
$result =execute_sql($conn,"id19291385_memberdb",$sql);

$mydata = array();

while($row = mysqli_fetch_assoc($result)){
//   echo "ID:". $row["ID"]."<br>"."品名:". $row["P_name"]."<br>"."數量:".$row["P_num"].
// "<br>"."評論:".$row["P_remark"]."<br>";
  $mydata [] = $row;

  sort($mydata);

}

echo json_encode($mydata);
mysqli_close($conn);


?>