<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset='utf-8'>
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">

    </head>
    <body class="container-fluid">
        <header>
        <nav>
        <div class="wrapper">
            <div class="logo"><a href=''></a></div>
            <div class="menu">
                <ul>
                    <li><a href="guns.php">List Senjata</a></li>
                    <li><a href="../index.php" class="tbl-biru">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>
        </header>
            <?php
            include "../koneksi.php";
            #stored function
            #get untuk mendapatkan jika ada id yang masuk
            if (isset($_GET['id'])) {
                $id = htmlspecialchars($_GET["id"]);
                # stored function untuk menghapus data
                $sql = "CALL DeleteProduct($id)";
                $hasil = mysqli_query($koneksi, $sql);
                if ($hasil) {
                    header("Location:halaman.php");

                } else {
                    echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
                }
            }
            ?>

            <tr class="table-danger">
                <br>
                <thead>
                    <tr>
                        <table class="my-3 table table-bordered">
                            <tr class="table-primary">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th colspan='2'>Aksi</th>
                            </tr>
                </thead>

                <?php
                include "../koneksi.php";

                //Stored procedure menghitung data produk yang telah dibuat
                $query = "SELECT Hitung() AS total";
                $result = mysqli_query($koneksi, $query);
                $row = mysqli_fetch_assoc($result);
                $totalProducts = $row['total'];

                $query = "SELECT Hitung() AS total";
                $result = mysqli_query($koneksi, $query);

                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $totalProducts = $row['total'];

                    echo "Jumlah produk: " . $totalProducts;
                } else {
                    echo "Error: " . mysqli_error($koneksi);
                }

                // mengisi tabel 
                $sql = "select * from produk order by id desc";
                $hasil = mysqli_query($koneksi, $sql);
                $no = 0;
                while ($data = mysqli_fetch_assoc($hasil)) {
                    $no++;
                    ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $data["nama"]; ?>
                            </td>
                            <td>
                                <?php echo $data["stok"]; ?>
                            </td>
                            <td>
                                    <!-- update -->
                                <a href="../crud/update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning"
                                    role="button">Update</a>
                                    
                                    <!-- delete -->
                                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id']; ?>"class="btn btn-danger" role="button">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                }
                ?>
                </table>
                <!-- menambahkan data -->
                <a href="../crud/create.php" class="btn btn-primary" role="button">Tambah Data</a>

                <!-- melihat histori perubahan dengan trigger -->
                <a href="laporan.php" class="btn btn-primary" role="button">Laporan Data</a>
                <footer class="bg-light">
                    <div class="text-center p-3" style="background:#FFFFFF" ;>
                        SayungGunshop &copy; 2024
                    </div>
                </footer>
    </body>

    </html>