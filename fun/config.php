<?php
    session_start();

    $server="localhost";
    $database="apna_design";
    $user="root";
    $password="";
    // create Connection
    $db=mysqli_connect($server,$user,$password,$database);

    if(!$db){
        die("connection Failed !");
    }else{
        // echo "connection successfull.";
    }


?>