<html>  
      <head>  
           <title>Rubrics</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                
                <div class="table-responsive">  
                     <h2 align="center">Create Rubric</h2><br />
                    <div id="creator">
                     <p>Created By: <form method = post> 
                                        <input type="text">
                                        <input type="submit" action="insert.php">
                                     </form>
                        </p>
                    </div>
                    <div>
                        <?php

                            $connect = mysqli_connect("localhost", "root", "", "test_db");    
                            $sql="SELECT name,id FROM student order by name";
                            $result = mysqli_query($connect, $sql);
                        ?>
                        <p>Select Student: </p>
                        <select class="form-control">
                            
                            <option value="">Select Student</option>
                            <option value="jpt">Student1</option>
                        </select>
                                            
                    </div>
                    
                    <br>
                    <div>
                        
                        <p>Add Column<button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success" onclick="myFunction()">+</button></p>
                    </div>
                    <br>
                    <br>
                    
                     <div id="live_data"></div>
                     
                </div>  
           </div>  
      </body>
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var Category = $('#category').text();  
           var Score = $('#score').text();  
           if(Category == '')  
           {  
                alert("Category can't be empty!!");  
                return false;  
           }  
           if(Score == '')  
           {  
                alert("Score can't be empty!!");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{Category:Category, Score:Score},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.category', function(){  
           var id = $(this).data("id1");  
           var first_name = $(this).text();  
           edit_data(id, Category, "Category");  
      });  
      $(document).on('blur', '.score', function(){  
           var id = $(this).data("id2");  
           var last_name = $(this).text();  
           edit_data(id,Score, "Score");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>
 </html>  
