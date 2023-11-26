<?php
session_start();
require "../connection.php";

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat datang</h1>
    <p>Ini adalah halaman dashboard yang hanya dapat diakses setelah login.</p>
    <a href="../Login&Registrasi/logout.php">Logout</a>
</body>
</html>