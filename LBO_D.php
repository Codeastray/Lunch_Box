<?php
		$data = file_get_contents("php://input","r");
		$mydata = array();
		$mydata = json_decode($data, true);
		if(isset($mydata["student_ID"])){
			if($mydata["student_ID"]!=""){
				$d_id = $mydata["student_ID"];
			
		        require_once("LBOdbtool.php");

		        $conn = create_connect();
                $sql = "DELETE FROM order_meal WHERE student_ID ='$d_id'";	
				

				 

		      if (execute_sql($conn,"id21028457_alltheworkdonedb",$sql)) {
		          if(mysqli_affected_rows($conn)==1){
		            echo'{"state": true, "message":"刪除成功!"}';
		          }else{
		            echo '{"state": false, "message":"刪除失敗, 語法成功但無此資料!"}';
		          }
		       // echo '{"state": true, "message":"更新成功!"'.mysqli_affected_rows($conn).'}';
		      } else {
		        echo '{"state": false, "message":"刪除失敗!'.mysqli_error($conn).'"}';
		      }

		      mysqli_close($conn);
		    }else{
		      echo '{"state": false, "message":"欄位不得為空白!"}';
		    }
		}else{
		    echo '{"state": false, "message":"API規定的欄位不存在!"}';
		}

?>