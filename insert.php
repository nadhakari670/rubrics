<?php  
 $connect = mysqli_connect("localhost", "root", "", "test_db");  
 $sql = "INSERT INTO tbl_sample(Creator, Category, Score) VALUES('".$POST["creator"]."','".$_POST["Category"]."', '".$_POST["Score"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 