<?php
$server='localhost';
$user='root';
$pass='';
$database='petshop';
$conn=mysqli_connect($server,$user,$pass,$database);
mysqli_query($conn,'set names "utf8"');
?>