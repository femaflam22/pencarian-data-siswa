<?php
include "../config/config.php";
include "../app/controller.php";
$go = new student();

@session_start();
if (@$_SESSION['user'] == "") {
    echo "
            <script>
            document.location.href='index.php'
            </script>
        ";
}
@$where = "kelas = $_GET[search_class]";
if (isset($_GET['search'])) {
    $filter = $_GET['selector'];
    $dataSearch = $_GET['data'];
    if($filter == 'semua'){
        $sql = "SELECT * FROM tb_siswa WHERE nama LIKE '%$dataSearch%' OR nis LIKE '%$dataSearch%' OR kelas LIKE '%$dataSearch%'";
    }else{
        $sql = "SELECT * FROM tb_siswa WHERE " . $filter . " like '%" . $dataSearch . "%' ORDER BY nis ASC";
    }
} else if (isset($_GET['search_class'])) {
    $sql = "SELECT * FROM tb_siswa WHERE " . $where . " ORDER BY nis ASC";
} else {
    $sql = "SELECT * FROM tb_siswa ORDER BY nis ASC";
}
$result = mysqli_query($con, $sql);
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
    <!-- <script src="/assets/js/script.js"></script> -->
    <title>Data Siswa</title>
</head>

<body>
    <div class="header">
        <div class="main-menu">
            <a href="home.php">data siswa</a>
            <div class="menu" onclick="menu()"></div>
        </div>
        <div class="hide-menu">
            <div class="first-menu">
                <h4>Cek data :</h4>
                <a href="home.php">Semua Siswa</a>
                <a href="?search_class=12">Kelas 12</a>
                <a href="?search_class=11">Kelas 11</a>
                <a href="?search_class=10">Kelas 10</a>
            </div>
            <hr>
            <div class="second-menu">
                <?php
                $all = "SELECT * FROM tb_siswa";
                $class10 = "SELECT * FROM tb_siswa WHERE kelas='10'";
                $class11 = "SELECT * FROM tb_siswa WHERE kelas='11'";
                $class12 = "SELECT * FROM tb_siswa WHERE kelas='12'";
                $all_students = count($go->datas($con, $all));
                $class_10 = count($go->datas($con, $class10));
                $class_11 = count($go->datas($con, $class11));
                $class_12 = count($go->datas($con, $class12));
                ?>
                <p>Jumlah Keseluruhan : <span><?php echo $all_students ?> siswa</span></p>
                <p>Siswa Kelas 12 : <span><?php echo $class_10 ?> siswa</span></p>
                <p>Siswa Kelas 11 : <span><?php echo $class_11 ?> siswa</span></p>
                <p>Siswa Kelas 10 : <span><?php echo $class_12 ?> siswa</span></p>
            </div>
            <h4>
                <a href="logout.php">logout</a>
            </h4>
        </div>
    </div>

    <div class="wrap">
        <!-- sidebar -->
        <div class="sidebar">
            <!-- pilihan data -->
            <div class="first-item">
                <img src="../assets/img/teacher.svg">
                <h4>
                    <a href="logout.php">logout</a>
                </h4>
            </div>
            <hr>
            <div class="second-item">
                <h4>Cek data :</h4>
                <div class="item">
                    <img src="../assets/img/class.svg">
                    <a href="home.php">Semua Siswa</a>
                </div>
                <div class="item">
                    <img src="../assets/img/class.svg">
                    <a href="?search_class=12">Kelas 12</a>
                </div>
                <div class="item">
                    <img src="../assets/img/class.svg">
                    <a href="?search_class=11">Kelas 11</a>
                </div>
                <div class="item last">
                    <img src="../assets/img/class.svg">
                    <a href="?search_class=10">Kelas 10</a>
                </div>
            </div>
            <hr>
            <!-- jumlah data -->
            <div class="last-item">
                <?php
                        $all = "SELECT * FROM tb_siswa";
                        $class10 = "SELECT * FROM tb_siswa WHERE kelas='10'";
                        $class11 = "SELECT * FROM tb_siswa WHERE kelas='11'";
                        $class12 = "SELECT * FROM tb_siswa WHERE kelas='12'";
                        $all_students = count($go->datas($con, $all));
                        $class_10 = count($go->datas($con, $class10));
                        $class_11 = count($go->datas($con, $class11));
                        $class_12 = count($go->datas($con, $class12));
                ?>
                <p>Jumlah Keseluruhan : <span><?php echo $all_students ?> siswa</span></p>
                <p>Siswa Kelas 12 : <span><?php echo $class_10 ?> siswa</span></p>
                <p>Siswa Kelas 11 : <span><?php echo $class_11 ?> siswa</span></p>
                <p>Siswa Kelas 10 : <span><?php echo $class_12 ?> siswa</span></p>
            </div>
        </div>
        <!-- tampilan data -->
        <div class="datas">
            <!-- cari data -->
            <div class="card">
                <div class="card-inner">
                    <label>Cari Data Berdasarkan :</label>
                    <form method="GET">
                        <!-- radio -->
                        <div class="filter-by">
                            <label for=nis" class="l-radio">
                                <input type="radio" id=nis" name="selector" tabindex="1" value="nis">
                                <span>NIS</span>
                            </label>
                            <label for="nama" class="l-radio">
                                <input type="radio" id="nama" name="selector" tabindex="2" value="nama">
                                <span>Nama</span>
                            </label>
                            <label for="kelas" class="l-radio">
                                <input type="radio" id="kelas" name="selector" tabindex="2" value="kelas">
                                <span>Kelas</span>
                            </label>
                            <label for="semua" class="l-radio">
                                <input type="radio" id="semua" name="selector" tabindex="2" value="semua">
                                <span>Semua</span>
                            </label>
                        </div>
                        <!-- search -->
                        <div class="inner">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#657789" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8" />
                                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                </svg>
                            </div>
                            <div class="input-search">
                                <input placeholder="cari data..." name="data" type="text" />
                            </div>
                            <button type="submit" class="search" name="search">cari</>
                        </div>
                    </form>
                </div>
            </div>
            <a href="home.php" class="refresh">Refresh Data</a>
            <!-- tabel -->
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <?php
                        $no = 0;
                        if(empty($go->datas($con,$sql))){
                            echo "<tr><td colspan='5' style='text-align: center;'><h1>DATA TIDAK DITEMUKAN</h1></td></tr>";
                        } else {
                        while ($data = mysqli_fetch_assoc($result)) {
                            $no++
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $data['nis'] ?></td>
                                <td><?php echo $data['nama'] ?></td>
                                <td><?php echo $data['tanggal_lahir'] ?></td>
                                <td><?php echo $data['kelas'] ?></td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="/assets/js/main.js"></script>

</html>