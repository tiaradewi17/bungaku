<?php
    $servername = "192.168.56.84";
    $username = "root";
    $database = "bunga";
    $password = "";

    $con = mysqli_connect($servername, $username, $password, $database);

    if(!$con){
        die("Koneksi gagal: ".mysqli_connect_error());
    }
?>