<?php
$username="root";
$password="";
$server="localhost";
$database="user12";
$conn= mysqli_connect($server,$username,$password,$database);
if ($conn){
    echo"success";

}
else{
    die("error".mysqli_connect_error());

}

?>