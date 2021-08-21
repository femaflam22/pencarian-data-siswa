<?php
class student
{
    function login($con, $table, $username, $password, $redirect)
    {
        session_start();
        $sql = "SELECT * FROM $table WHERE username='$username' AND password='$password'";
        $jalan = mysqli_query($con, $sql);
        $cek = mysqli_num_rows($jalan);
        if ($cek > 0) {
            $_SESSION['user'] = $username;
            echo "<script>
                document.location.href='$redirect'
                </script>";
        }
        else {
            echo "<script>
                fail('gagal login, silahkan coba ulang');
                </script>";
        }
    }

    function datas($con, $sql)
    {
        $run = mysqli_query($con, $sql);
        while ($data = mysqli_fetch_assoc($run))
            $datas[] = $data;
        return @$datas;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- <script src="/assets/js/script.js"></script> -->
    <title>Data Siswa</title>
</head>

<body>

</body>
<script src="../assets/js/main.js"></script>

</html>