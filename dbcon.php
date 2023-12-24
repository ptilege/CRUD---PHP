<?php

$conn = new mysqli("localhost","root","","crud_operations");

if($conn->connect_error ){
    die("connection failed: " . $conn->connect_error);
}


?>