<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SayungGunshop</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    GUNSHOP
</title>
<body class="container-fluid">
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''></a></div>
            <div class="menu">
                <ul>
                    <li><a href="halaman.php">Data</a></li>
                    <li><a href="../index.php" class="tbl-biru">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
        include "../koneksi.php";

        // Filter View
        $filter = isset($_GET['stokFilter']) ? $_GET['stokFilter'] : 'all';

        if ($filter == 'above') {
            $sql = "SELECT * FROM produk WHERE stok > 100 ORDER BY id DESC";
        } elseif ($filter == 'below') {
            $sql = "SELECT * FROM produk WHERE stok < 100 ORDER BY id DESC";
        } else {
            $sql = "SELECT * FROM produk ORDER BY id DESC";
        }


        $hasil = mysqli_query($koneksi, $sql);
        $no = 0;
        ?>
    <div class="container">
        <br>
        <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <br>
            <br>
            <br>
            <label for="stokFilter">Filter Stok:</label>
            <select name="stokFilter" id="stokFilter" class="form-control">
                <option value="all">Semua</option>
                <option value="above">Di atas 100</option>
                <option value="below">Di bawah 100</option>
            </select>
            <button type="submit" class="btn btn-primary mt-2">Filter</button>
        </form>
        <tr class="table-danger">
            <br>
            <thead>
                <tr>
                    <table class="my-3 table table-bordered">
                        <tr class="table-primary">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Stok</th>
                        </tr>
                        <tbody>
                            <tr>
                            <?php include "view.php"; ?>
                            </tr>
                        </tbody>
                    </table>
                </tr>
            </thead>
        </tr>
    </div>
</body>

</html>