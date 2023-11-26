<?php
include '../connection.php';

    function registrasi($data) {
        global $connection;
    
        $username = stripcslashes($data["username"]);
        $email = ($data["email"]);
        $password1 = mysqli_real_escape_string($connection, $data["password1"]);
        $password2 = mysqli_real_escape_string($connection, $data["password2"]);
    
        $result = mysqli_query($connection,"SELECT username FROM users WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Username sudah digunakan!');
                </script>";
    
            return false;
        }
    
        if($password1 !== $password2) {
            echo "<script>
                    alert('Konfirmasi password tidak sesuai!');
                </script>";
            return false;
        }
    
        $password1 = password_hash($password1, PASSWORD_DEFAULT);
    
        mysqli_query($connection,"INSERT INTO users VALUES ('', '$username', '$email', '$password1')");
    
        return mysqli_affected_rows($connection);
    }

if (isset($_POST['register'])) {
    if(registrasi($_POST) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan!');
            </script>";
    } else {
        echo mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="../AllCSS/styleRegistrasi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <form method="post" style="font-family: 'Inter', sans-serif; font-size: 22px;">
        <ul>
            <label for="username">Username</label><br>
            <input type="text" name="username" id="username" autocomplete="off" placeholder="Masukkan Username"><br><br>

            <label for="email">Email</label><br>
            <input type="text" name="email" id="email" autocomplete="off" placeholder="Masukkan Email"><br><br>

            <label for="passsword1">Password :</label><br>
            <input type="password" name="password1" id="password1" placeholder="Masukkan Password"><br><br>

            <label for="passsword2">Konfirmasi Password :</label><br>
            <input type="password" name="password2" id="password2" placeholder="Ulangi Password"><br><br><br>

            <button type="submit" name="register" style="translate: 3px;"><b>Register</b></button>
            <p id="CreateAccount" style="font-size: medium; translate: 25px; width: 60%;">Already have an account? <a href="login.php">Continue to Login</a></p>
        </ul>
    </form>
</body>
</html>