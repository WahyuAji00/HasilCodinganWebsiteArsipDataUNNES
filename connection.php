<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "latihanpersiapanwebsite";
    $port = "3306";
    
    $connection = mysqli_connect($host, $user, $password, $database, $port);

    if ($connection->connect_error) {
        die("Koneksi gagal: " . $connection->connect_error);
    }
?>