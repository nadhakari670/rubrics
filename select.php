<?php  
 $connect = mysqli_connect("localhost", "root", "", "test_db");  
 $output = '';  
 $sql = "SELECT * FROM tbl_sample ORDER BY id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr id=headerRow>  
                     
                     <th width="40%">Citeria</th>  
                     <th width="10%">Score</th>  
                     <th width="10%">Add/Delete</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     
                     <td class="category" data-id1="'.$row["id"].'" contenteditable>'.$row["Category"].'</td>  
                     <td class="score" data-id2="'.$row["id"].'" contenteditable>'.$row["Score"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">DELETE</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                
                <td id="category" contenteditable></td>  
                <td id="score" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">ADD</button></td>  
           </tr>  
      ';  
 }  
 else  
 {    $sql = "ALTER TABLE tbl_sample AUTO_INCREMENT=0";
      $result = mysqli_query($connect, $sql);
      $output .= '<tr>
                          
                          <td id="category" contenteditable></td>  
                          <td id="score" contenteditable></td> 
                          <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">ADD</button></td>
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>