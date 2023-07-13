<?php
	
			
		        require_once("LBOdbtool.php");

		        $conn = create_connect();
                $sql = "DELETE FROM lunch_name";	
				
		      if (execute_sql($conn,"id21028457_alltheworkdonedb",$sql)) {
		          if(mysqli_affected_rows($conn)>0){
		            echo'{"state": true, "message":"刪除成功!"}';
		          }else{
		            echo '{"state": false, "message":"刪除失敗, 語法成功但無此資料!"}';
		          }
		       // echo '{"state": true, "message":"更新成功!"'.mysqli_affected_rows($conn).'}';
		      } else {
		        echo '{"state": false, "message":"刪除失敗!'.mysqli_error($conn).'"}';
		      }

		   

?>