<?php

$conn = mysqli_connect("localhost","root","passwd","mydb");


$query = "SELECT * FROM register";

    $result = mysqli_query($conn,$query);

    $emparray = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);

    mysqli_close($conn);
?>