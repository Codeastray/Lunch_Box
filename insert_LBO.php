<?php
// $ID = @$_POST["stu_ID"];
// $box1 = @$_POST["lunch_1"];
// $box2 = @$_POST["lunch_2"];
$data = file_get_contents("php://input", 'r');
$mydata = array();
$mydata = json_decode($data, true);
$mydata["stu_ID"]=(int)$mydata["stu_ID"];
if (
  isset($mydata["stu_ID"]) && isset($mydata["lunch_1"]) && isset($mydata["lunch_2"]) && $mydata["stu_ID"] > 0
  && $mydata["stu_ID"] < 31 && is_int($mydata["stu_ID"]) && mb_strlen( $mydata["ps"], "utf-8")>=0 && mb_strlen( $mydata["ps"], "utf-8")<9
) {
  if ($mydata["stu_ID"] != "" && $mydata["lunch_1"] != "" && $mydata["lunch_2"] != "") {

    $ID = $mydata["stu_ID"];
    $box1 = $mydata["lunch_1"];
    $box2 = $mydata["lunch_2"];
    $ps = $mydata["ps"];


    require_once("LBOdbtool.php");
    $conn = create_connect();
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // echo "連線成功";

    mysqli_query($conn, "SET NAMES utf8");

    //建立mysql執行的指令

    $sql = "INSERT INTO order_meal (student_ID, No_1_dish, No_2_dish,PS)
      VALUES ('$ID', '$box1', '$box2','$ps')";

    if (execute_sql($conn, "id21028457_alltheworkdonedb", $sql)) {
      echo '{"state": true, "message":"新增成功!"}';
    } else {
      echo '{"state": false, "message":"新增失敗"}';
    }

    mysqli_close($conn);
  } else {
    echo '{"state" : false, "message" : "欄位錯誤!" }';
  }
} else {
  echo '{"state": false, "message":"欄位輸入不符規定"}';
}
?>