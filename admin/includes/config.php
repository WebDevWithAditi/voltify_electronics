<?php
$server="localhost";
$username="root";
$password="";
$db="voltify_electronics";

$con=mysqli_connect($server,$username,$password,$db);


if(!$con){
    die("Connection Failed: " . mysqli_connect_error());
}
?>