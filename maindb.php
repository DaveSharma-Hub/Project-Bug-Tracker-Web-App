<?php
    

    $username="";
    $password="";
    $connection= new mysqli("localhost",$username,$password,"tracker");
 
     if($connection->connect_error){
         die("Failed to connect: ".$connection->connect_error);
     }
?>

