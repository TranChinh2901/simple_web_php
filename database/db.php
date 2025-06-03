<?php
$server = "localhost";
$name = "root";
$password = "";
$database = "mungnam";

$conn = mysqli_connect($server, $name, $password, $database);
if ($conn) {
    mysqli_query($conn, "SET NAMES 'utf8'");
} else {
    echo "Connection failed: " . mysqli_connect_error();
    exit();
}
