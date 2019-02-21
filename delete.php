<?php  
 $connect = mysqli_connect("localhost", "root", "", "test_db");  
 $sql = "DELETE FROM tbl_sample WHERE id = '".$_POST["id"]."'";

 if(mysqli_query($connect, $sql))  
 {  
      
      echo (mysqli_query($connect, "SET @autoid :=0; UPDATE tbl_sample SET id = @autoid:= (@autoid+1);ALTER TABLE tbl_sample AUTO_INCREMENT = 1;"));
      
 }

 ?>