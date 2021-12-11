<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = mysqli_connect("localhost","root","passwd","mydb");

    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        echo "Connection successfull .";
    }


    if(isset($_POST['submit']))
{    
     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $sql = "INSERT INTO register (name,email,password)
     VALUES ('$name','$email','$password')";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
        header("Location:http://localhost/php/dharil/task/login.php");
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}

?>