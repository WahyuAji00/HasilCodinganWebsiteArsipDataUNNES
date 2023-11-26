<?php
session_start();
require '../connection.php';

if(isset($_SESSION['login'])) {
    header('Location: ../TampilanUser/dashboard1.html');
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            header("Location: ../TampilanUser/dashboard1.html");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../AllCSS/styleLogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <form method="post" style="font-family: 'Inter', sans-serif; font-size: 22px;">
        <ul>
            <?php if(isset($error)) : ?>
                <p style="color: red; font-size: 18px;">Username atau Password Salah</p>
            <?php endif; ?>
        
            <label for="username">Username </label> <br>
            <input type="text" name="username" id="username" autocomplete="off" placeholder="Masukkan Username"> <br><br>
        
            <label for="password">Password </label> <br>
            <input type="password" name="password" id="password" placeholder="Masukkan Password"><br><br><br>
        
            <button type="submit" name="login" style="translate: 3px;"><b>Login</b></button>
            <p id="CreateAccount" style="font-size: medium; translate: 25px; width: 60%;">Don't have an account? <a href="registrasi.php">Create your Account</a></p>
        </ul>
    </form>
</body>
</html>