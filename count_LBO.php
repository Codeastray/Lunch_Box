<?php
		$data = file_get_contents("php://input","r");
		$mydata = array();
		$mydata = json_decode($data, true);

		 $servername = "localhost";
         $username = "id19291385_user";
         $password = "s5ygkj2g-T*ja&{X";
         $dbname = "id19291385_memberdb";
				
		            $conn = mysqli_connect($servername, $username, $password,$dbname);
				      // Check connection
				      if (!$conn) {
				        die("Connection failed: " . mysqli_connect_error());
				      }

				      // echo "連線成功";

				       mysqli_query($conn, "SET NAMES utf8");

				      //建立mysql執行的指令

				      $sql = "SELECT No_2_dish FROM order_meal WHERE No_2_dish = '一個'";





				      $result = mysqli_query($conn, $sql);

						// $mydata = array();

						// while($row = mysqli_fetch_assoc($result)){
						//   echo "ID:". $row["ID"]."<br>"."品名:". $row["P_name"]."<br>"."數量:".$row["P_num"].
						// "<br>"."評論:".$row["P_remark"]."<br>";
						//   $mydata [] = $row;

						// }
						mysqli_num_rows($result);
						mysqli_close($conn);


				    



				
		
?>