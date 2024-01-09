<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
    <title>Laporan GUNSHOP</title>
</head>

<body class="container-fluid">
<nav>
        <div class="wrapper">
            <div class="logo"><a href=''></a></div>
        </div>
    </nav>
    <div class="container">
        <br>
        <h4>
            <center>Laporan Perubahan Data GUNSHOP</center>
        </h4>

        <table class="my-3 table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../koneksi.php";
                $sql_laporan = "SELECT * FROM laporan ORDER BY timestamp DESC";
                $hasil = mysqli_query($koneksi, $sql_laporan);

                $no = 0;
                while ($data = mysqli_fetch_assoc($hasil)) {
                    $no++;
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data["nama"]; ?></td>
                        <td><?php echo $data["keterangan"]; ?></td>
                        <td><?php echo $data["timestamp"]; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <a href="halaman.php" class="btn btn-primary" role="button">Kembali ke Data Produk</a>
    </div>
</body>

</html>