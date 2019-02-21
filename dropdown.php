<?php

$connect = mysqli_connect("localhost", "root", "", "test_db");    
$sql="SELECT name,id FROM student order by name";
$result = mysqli_query($connect, $sql); 

echo "<select name=student value=''>Student Name</option>"; 

foreach ($result as $row){
    echo "<option value=$row[id]>$row[name]</option>"; 
}

 echo "</select>";

?>