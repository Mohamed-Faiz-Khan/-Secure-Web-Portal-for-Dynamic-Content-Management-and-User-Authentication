<?php
    error_reporting(0);
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="digilocker clone";
    $con = mysqli_connect($servername,$username,$password,$dbname);
    if($con)
    {
        //  echo "Connection ok";
    }
    else
    {
        echo "Connection Failed".mysqli_connect_error();
    }
?>





