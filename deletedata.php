<?php  
 $connect = mysqli_connect("localhost", "root", "passwd", "mydb");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $id = $data->id;
      $name = mysqli_real_escape_string($connect, $data->name);
      $email = mysqli_real_escape_string($connect, $data->email); 
      $password = mysqli_real_escape_string($connect, $data->password);  
      $btn_name = $data->btnName;   
      if($btn_name == "Delete")  
      {  
           $query = "DELETE FROM register WHERE id='$id'";  
           if(mysqli_query($connect, $query))  
           {  
                echo "Data Deleted...";  
           }  
           else  
           {  
                echo 'Error';  
           }  
      }  
      if($btn_name == 'Update')  
      {  
           $id = $data->id;  
           $query = "UPDATE register SET name = '$name', email = '$email',password = '$password' WHERE id = '$id'";  
           if(mysqli_query($connect, $query))  
           {  
                echo 'Data Updated...';  
           }  
           else  
           {  
                echo 'Error';  
           }  
      }  
 }  
 ?>  