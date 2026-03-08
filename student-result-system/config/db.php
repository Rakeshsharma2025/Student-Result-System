<?php

$host="localhost";
$user="root";
$password="";
$db="student_result_db";

$conn = mysqli_connect($host,$user,$password,$db);

if(!$conn){
    die("Database connection failed");
}

?>
