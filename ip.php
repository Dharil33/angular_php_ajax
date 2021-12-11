<?php  

 $connect = mysqli_connect("localhost", "root", "passwd", "mydb");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $name = mysqli_real_escape_string($connect, $data->name);       
      $email = mysqli_real_escape_string($connect, $data->email);
      $password = mysqli_real_escape_string($connect, $data->password);  
      $query = "INSERT INTO register(name,email,password) VALUES ('$name', '$email','$password')";  
      if(mysqli_query($connect, $query))  
      {  
           echo true;  
      }  
      else  
      {  
           echo 'Error';  
      }  
 }  
 ?>  