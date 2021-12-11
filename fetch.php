<?php

    $conn = mysqli_connect("localhost","root","passwd","mydb");
    
    $postdata = file_get_contents("php://input");
    $json = json_decode($postdata);
    $name = $json->name;
    $email = $json->email;
    $password = $json->password;
 
    $query=mysqli_query($conn, "SELECT * FROM register WHERE email='$email' && `password`='$password'") or die(mysqli_error());
    $row=mysqli_num_rows($query);
    $fetch=mysqli_fetch_array($query); 
    if($row > 0){
        session_start();
        $_SESSION['user_id'] = $fetch['id'];
        echo true;
    }else{
        echo "Not Logged in";
    }
    exit();
?>