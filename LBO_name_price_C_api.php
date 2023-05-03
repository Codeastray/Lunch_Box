<?php
  // $ID = @$_POST["stu_ID"];
  // $box1 = @$_POST["lunch_1"];
  // $box2 = @$_POST["lunch_2"];
  $data = file_get_contents("php://input",'r');
  $mydata = array();
  $mydata = json_decode($data, true);
  if(isset($mydata["lunch_name1"])&& isset($mydata["lunch_name2"]) &&isset($mydata["price_1"]) && isset($mydata["price_2"])&& isset($mydata["date"])){
    if($mydata["lunch_name1"]!="" &&$mydata["lunch_name2"]!="" &&$mydata["price_1"]!=""&&$mydata["price_2"]!=""&&$mydata["date"]!=""){
      
      $name1 = $mydata["lunch_name1"];
      $name2 = $mydata["lunch_name2"];
      $price1 = $mydata["price_1"];
      $price2 = $mydata["price_2"];
      $date = $mydata["date"];

      require_once("LBOdbtool.php");
      $conn = create_connect();
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // echo "連線成功";

       mysqli_query($conn, "SET NAMES utf8");

      //建立mysql執行的指令

      $sql = "INSERT INTO lunch_name (Lunch_Name1, Lunch_Name2, Price_1,Price_2,Date)
      VALUES ('$name1', '$name2', '$price1', '$price2','$date')";

      if (execute_sql($conn,"id19291385_memberdb",$sql)) {
        echo '{"state": true, "message":"新增成功!"}';
      } else {
        echo '{"state": false, "message":"新增失敗"}';
      }

      mysqli_close($conn);

    }else{
      echo '{"state" : false, "message" : "欄位錯誤!" }';
    }
      
  }else{
    echo '{"state": false, "message":"欄位輸入不符規定"}';
  }


  
?>