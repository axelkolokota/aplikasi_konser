<?php
$server  = "localhost";
$user    = "root";
$pass    = "";
$dbname  = "db_konser";
$conn = mysqli_connect($server , $user , $pass , $dbname);


    if ( mysqli_connect_error()) {
        echo " koneksi gagal".mysqli_connect_error();
    }
?>