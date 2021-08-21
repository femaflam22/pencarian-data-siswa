<?php
include "../config/config.php";
include "../app/controller.php";
$go = new student();
@$username = $_POST['user'];
@$password = $_POST['pw'];
$redirect = 'home.php';
$table = 'tb_user';

if (isset($_POST['login'])) {
    $go->login($con, $table, $username, $password, $redirect);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Data Siswa</title>
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="left">

            </div>
            <div class="right">
                <h2>login</h2>
                <form method="post">
                    <input type="text" name="user" placeholder="Masukkan Username">
                    <input type="password" name="pw" placeholder="Masukkan Password">
                    <button type="submit" class="btn" name="login">submit</button>
                </form>
                <p>Hubungi (021)220106 apabila terdapat kendala</p>
            </div>
        </div>
    </div>
</body>

</html>