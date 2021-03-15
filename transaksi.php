<?php
//Koneksi Database
$server = "localhost";
$user = "root";
$pass = "";
$database = "apotek";

$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

//Jika tombol simpan diklik
if(isset($_POST['bsimpan']))
{
    //Menentukan Tabel yang mana data akan di insert
    $mydate = $_POST['ttgl_transaksi'];
    $bulan = date("m", strtotime($mydate));

    if((int)$bulan == 1)
    {
        //pengujian apakah data akan diedit atau disimpan baru
        if($_GET['januari'] == "edit")
        {
            //Data akan diedit
            $edit = mysqli_query($koneksi, " UPDATE penjualan_januari SET
                                            kode_obat = '$_POST[tkode_obat]',
                                            tgl_transaksi = '$_POST[ttgl_transaksi]',
                                            jumlah_terjual = $_POST[tjumlah_terjual]
                                            WHERE kode_obat = '$_GET[id]'
                                            ");
            if($edit)
            {
                echo "<script>
                alert('Edit data sukses!');
                document.location='transaksi.php';
                </script>";
            }else{
                echo "<script>
                alert('Edit data GAGAL!');
                document.location='transaksi.php';
                </script>";
            }
        }else{
            //Data akan disimpan baru
            $simpan = mysqli_query($koneksi, "INSERT INTO penjualan_januari (kode_obat, tgl_transaksi, jumlah_terjual)
                                            VALUES ('$_POST[tkode_obat]','$_POST[ttgl_transaksi]',$_POST[tjumlah_terjual])
                                            ");
            if($simpan)
            {
                echo "<script>
                alert('Simpan data sukses!');
                document.location='transaksi.php';
                </script>";
            }else{
                echo "<script>
                alert('Simpan data GAGAL!');
                document.location='transaksi.php';
                </script>";
            }
        }

    }
    elseif((int)$bulan == 2)
    {
        //pengujian apakah data akan diedit atau disimpan baru
        if($_GET['februari'] == "edit")
        {
            //Data akan diedit
            $edit = mysqli_query($koneksi, " UPDATE penjualan_februari SET
                                            kode_obat = '$_POST[tkode_obat]',
                                            tgl_transaksi = '$_POST[ttgl_transaksi]',
                                            jumlah_terjual = $_POST[tjumlah_terjual]
                                            WHERE kode_obat = '$_GET[id]'
                                            ");
            if($edit)
            {
                echo "<script>
                alert('Edit data sukses!');
                document.location='transaksi.php';
                </script>";
            }else{
                echo "<script>
                alert('Edit data GAGAL!');
                document.location='transaksi.php';
                </script>";
            }
        }else{
            //Data akan disimpan baru
            $simpan = mysqli_query($koneksi, "INSERT INTO penjualan_februari (kode_obat, tgl_transaksi, jumlah_terjual)
                                            VALUES ('$_POST[tkode_obat]','$_POST[ttgl_transaksi]',$_POST[tjumlah_terjual])
                                            ");
            if($simpan)
            {
                echo "<script>
                alert('Simpan data sukses!');
                document.location='transaksi.php';
                </script>";
            }else{
                echo "<script>
                alert('Simpan data GAGAL!');
                document.location='transaksi.php';
                </script>";
            }
        }
    }
    elseif((int)$bulan == 3)
    {
        //pengujian apakah data akan diedit atau disimpan baru
        if($_GET['maret'] == "edit")
        {
            //Data akan diedit
            $edit = mysqli_query($koneksi, " UPDATE penjualan_maret SET
                                            kode_obat = '$_POST[tkode_obat]',
                                            tgl_transaksi = '$_POST[ttgl_transaksi]',
                                            jumlah_terjual = $_POST[tjumlah_terjual]
                                            WHERE kode_obat = '$_GET[id]'
                                            ");
            if($edit)
            {
                echo "<script>
                alert('Edit data sukses!');
                document.location='transaksi.php';
                </script>";
            }else{
                echo "<script>
                alert('Edit data GAGAL!');
                document.location='transaksi.php';
                </script>";
            }
        }else{
            //Data akan disimpan baru
            $simpan = mysqli_query($koneksi, "INSERT INTO penjualan_maret (kode_obat, tgl_transaksi, jumlah_terjual)
                                            VALUES ('$_POST[tkode_obat]','$_POST[ttgl_transaksi]',$_POST[tjumlah_terjual])
                                            ");
            if($simpan)
            {
                echo "<script>
                alert('Simpan data sukses!');
                document.location='transaksi.php';
                </script>";
            }else{
                echo "<script>
                alert('Simpan data GAGAL!');
                document.location='transaksi.php';
                </script>";
            }
        }
    }
    elseif((int)$bulan == 4)
    {
        //pengujian apakah data akan diedit atau disimpan baru
        if($_GET['april'] == "edit")
        {
            //Data akan diedit
            $edit = mysqli_query($koneksi, " UPDATE penjualan_april SET
                                            kode_obat = '$_POST[tkode_obat]',
                                            tgl_transaksi = '$_POST[ttgl_transaksi]',
                                            jumlah_terjual = $_POST[tjumlah_terjual]
                                            WHERE kode_obat = '$_GET[id]'
                                            ");
            if($edit)
            {
                echo "<script>
                alert('Edit data sukses!');
                document.location='transaksi.php';
                </script>";
            }else{
                echo "<script>
                alert('Edit data GAGAL!');
                document.location='transaksi.php';
                </script>";
            }
        }else{
            //Data akan disimpan baru
            $simpan = mysqli_query($koneksi, "INSERT INTO penjualan_april (kode_obat, tgl_transaksi, jumlah_terjual)
                                            VALUES ('$_POST[tkode_obat]','$_POST[ttgl_transaksi]',$_POST[tjumlah_terjual])
                                            ");
            if($simpan)
            {
                echo "<script>
                alert('Simpan data sukses!');
                document.location='transaksi.php';
                </script>";
            }else{
                echo "<script>
                alert('Simpan data GAGAL!');
                document.location='transaksi.php';
                </script>";
            }
        }
    }
    else{
        echo "<script>
        alert('TERJADI KESALAHAN!');
        document.location='transaksi.php';
        </script>";
    }

}

//pengujian jika tombol januari edit / hapus diklik
if(isset($_GET['januari']))
{
    //pengujian jika edit data
    if($_GET['januari'] == "edit")
    {
        //tampilkan data yang akan diedit
        $tampil = mysqli_query($koneksi, "SELECT * FROM penjualan_januari WHERE kode_obat = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);
        if($data)
        {
            //Jika data ditemukan maka data ditampung kedalam variabel
            $vkode_obat = $data['kode_obat'];
            $vtgl_transaksi = $data['tgl_transaksi'];
            $vjumlah_terjual = $data['jumlah_terjual'];
        }
    }
    elseif($_GET['januari'] == "hapus")
    {
        //persiapan hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM penjualan_januari WHERE kode_obat = '$_GET[id]' ");
        if($hapus)
            {
                echo "<script>
                alert('Hapus data sukses!');
                document.location='transaksi.php';
                </script>";
            }else{
                echo "<script>
                alert('Hapus data GAGAL!');
                document.location='transaksi.php';
                </script>";
            }
    }
}
elseif(isset($_GET['februari']))
{
    //pengujian jika edit data
    if($_GET['februari'] == "edit")
    {
        //tampilkan data yang akan diedit
        $tampil = mysqli_query($koneksi, "SELECT * FROM penjualan_februari WHERE kode_obat = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);
        if($data)
        {
            //Jika data ditemukan maka data ditampung kedalam variabel
            $vkode_obat = $data['kode_obat'];
            $vtgl_transaksi = $data['tgl_transaksi'];
            $vjumlah_terjual = $data['jumlah_terjual'];
        }
    }
    elseif($_GET['februari'] == "hapus")
    {
        //persiapan hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM penjualan_februari WHERE kode_obat = '$_GET[id]' ");
        if($hapus)
            {
                echo "<script>
                alert('Hapus data sukses!');
                document.location='transaksi.php';
                </script>";
            }else{
                echo "<script>
                alert('Hapus data GAGAL!');
                document.location='transaksi.php';
                </script>";
            }
    }
}
elseif(isset($_GET['maret']))
{
    //pengujian jika edit data
    if($_GET['maret'] == "edit")
    {
        //tampilkan data yang akan diedit
        $tampil = mysqli_query($koneksi, "SELECT * FROM penjualan_maret WHERE kode_obat = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);
        if($data)
        {
            //Jika data ditemukan maka data ditampung kedalam variabel
            $vkode_obat = $data['kode_obat'];
            $vtgl_transaksi = $data['tgl_transaksi'];
            $vjumlah_terjual = $data['jumlah_terjual'];
        }
    }
    elseif($_GET['maret'] == "hapus")
    {
        //persiapan hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM penjualan_maret WHERE kode_obat = '$_GET[id]' ");
        if($hapus)
            {
                echo "<script>
                alert('Hapus data sukses!');
                document.location='transaksi.php';
                </script>";
            }else{
                echo "<script>
                alert('Hapus data GAGAL!');
                document.location='transaksi.php';
                </script>";
            }
    }
}
elseif(isset($_GET['april']))
{
    //pengujian jika edit data
    if($_GET['april'] == "edit")
    {
        //tampilkan data yang akan diedit
        $tampil = mysqli_query($koneksi, "SELECT * FROM penjualan_april WHERE kode_obat = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);
        if($data)
        {
            //Jika data ditemukan maka data ditampung kedalam variabel
            $vkode_obat = $data['kode_obat'];
            $vtgl_transaksi = $data['tgl_transaksi'];
            $vjumlah_terjual = $data['jumlah_terjual'];
        }
    }
    elseif($_GET['april'] == "hapus")
    {
        //persiapan hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM penjualan_april WHERE kode_obat = '$_GET[id]' ");
        if($hapus)
            {
                echo "<script>
                alert('Hapus data sukses!');
                document.location='transaksi.php';
                </script>";
            }else{
                echo "<script>
                alert('Hapus data GAGAL!');
                document.location='transaksi.php';
                </script>";
            }
    }
}

//jika reset di klik
elseif(isset($_POST['breset']))
{
    $vkode_obat = NULL;
    $vnama_obat = NULL;
    $vbentuk_obat = NULL;
    $vtgl_produksi = NULL;
    $vtgl_kadaluarsa = NULL;
    $vharga_satuan = NULL;
    $vjumlah_sedia = NULL;
}

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Transaksi</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <!-- Header Website -->
        <h1 class="text-center">Data Transaksi Apotek</h1>

        <!-- Menu ke Tabel Transaksi -->
        <form action="obat.php" method="post" class="mt-5">
            <div>
                <button type="KeObat" class="btn btn-info">Menuju Tabel Obat</button>
            </div>
        </form>

        <!-- Awal Card Form -->
        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Form Input Data Transaksi
            </div>
            <div class="card-body">
                <form method="post" action="">

                    <!-- Form Kode Obat -->
                    <div class="form-group">
                        <label>Kode Obat</label>
                        <input type="text" name="tkode_obat" value="<?=@$vkode_obat?>" class="form-control" placeholder="Input Kode Obat" required>
                    </div>

                    <!-- Form Tanggal Transaksi -->
                    <div>
                        <label>Tanggal Transaksi</label>
                        <input type="date" name="ttgl_transaksi" value="<?=@$vtgl_transaksi?>" class="form-control" placeholder="Input Tanggal Transaksi" required>
                    </div>

                    <!-- Form Jumlah Terjual -->
                    <div>
                        <label class="mt-3">Jumlah Terjual</label>
                        <input type="number" name="tjumlah_terjual" value="<?=@$vjumlah_terjual?>" class="form-control" placeholder="Input Jumlah Terjual" required>
                    </div>

                    <!-- Button -->
                    <button type="submit" class="btn btn-success mt-3" name="bsimpan">Simpan</button>
                    <button type="reset" class="btn btn-danger mt-3" name="breset">Reset</button>

                </form>
            </div>
        </div>
        <!-- Akhir Card Form -->

        

        <!-- Awal Tabel Transaksi Januari -->
        <div class="card mt-1">
            <div class="card-header bg-success text-white">
                Tabel Data Transaksi Januari
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Kode Obat</th>
                        <th>Tanggal Transaksi</th>
                        <th>Jumlah Terjual</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM penjualan_januari ORDER BY tgl_transaksi asc");
                    while($data = mysqli_fetch_array($tampil)) :
                    ?>
                    <tr>
                        <td><?=$data['kode_obat']?></td>
                        <td><?=$data['tgl_transaksi']?></td>
                        <td><?=$data['jumlah_terjual']?></td>
                        <td>
                            <a href="transaksi.php?januari=edit&id=<?=$data['kode_obat']?>" class="btn btn-warning">Edit</a>
                            <a href="transaksi.php?januari=hapus&id=<?=$data['kode_obat']?>"
                                onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; //penutup perulangan while ?>
                </table>
            </div>
        </div>
        <!-- Akhir Tabel -->

        <!-- Awal Tabel Transaksi Februari -->
        <div class="card mt-1">
            <div class="card-header bg-success text-white">
                Tabel Data Transaksi Februari
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Kode Obat</th>
                        <th>Tanggal Transaksi</th>
                        <th>Jumlah Terjual</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM penjualan_februari ORDER BY tgl_transaksi asc");
                    while($data = mysqli_fetch_array($tampil)) :
                    ?>
                    <tr>
                        <td><?=$data['kode_obat']?></td>
                        <td><?=$data['tgl_transaksi']?></td>
                        <td><?=$data['jumlah_terjual']?></td>
                        <td>
                            <a href="transaksi.php?februari=edit&id=<?=$data['kode_obat']?>" class="btn btn-warning">Edit</a>
                            <a href="transaksi.php?februari=hapus&id=<?=$data['kode_obat']?>"
                                onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; //penutup perulangan while ?>
                </table>
            </div>
        </div>
        <!-- Akhir Tabel -->

        <!-- Awal Tabel Transaksi Maret -->
        <div class="card mt-1">
            <div class="card-header bg-success text-white">
                Tabel Data Transaksi Maret
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Kode Obat</th>
                        <th>Tanggal Transaksi</th>
                        <th>Jumlah Terjual</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM penjualan_maret ORDER BY tgl_transaksi asc");
                    while($data = mysqli_fetch_array($tampil)) :
                    ?>
                    <tr>
                        <td><?=$data['kode_obat']?></td>
                        <td><?=$data['tgl_transaksi']?></td>
                        <td><?=$data['jumlah_terjual']?></td>
                        <td>
                            <a href="transaksi.php?maret=edit&id=<?=$data['kode_obat']?>" class="btn btn-warning">Edit</a>
                            <a href="transaksi.php?maret=hapus&id=<?=$data['kode_obat']?>"
                                onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; //penutup perulangan while ?>
                </table>
            </div>
        </div>
        <!-- Akhir Tabel -->

        <!-- Awal Tabel Transaksi April -->
        <div class="card mt-1">
            <div class="card-header bg-success text-white">
                Tabel Data Transaksi April
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Kode Obat</th>
                        <th>Tanggal Transaksi</th>
                        <th>Jumlah Terjual</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM penjualan_april ORDER BY tgl_transaksi asc");
                    while($data = mysqli_fetch_array($tampil)) :
                    ?>
                    <tr>
                        <td><?=$data['kode_obat']?></td>
                        <td><?=$data['tgl_transaksi']?></td>
                        <td><?=$data['jumlah_terjual']?></td>
                        <td>
                            <a href="transaksi.php?april=edit&id=<?=$data['kode_obat']?>" class="btn btn-warning">Edit</a>
                            <a href="transaksi.php?april=hapus&id=<?=$data['kode_obat']?>"
                                onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; //penutup perulangan while ?>
                </table>
            </div>
        </div>
        <!-- Akhir Tabel -->

        <!-- Awal Tabel Merge data transaksi Januari s/d Maret -->
        <div class="card mt-1">
            <div class="card-header bg-success text-white">
                Tabel Data Merge data transaksi Januari s/d Maret
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Kode Obat</th>
                        <th>Tanggal Transaksi</th>
                        <th>Jumlah Terjual</th>
                    </tr>
                    <?php
                    $tampil = mysqli_query($koneksi, "(SELECT * FROM penjualan_januari)
                    UNION (SELECT * FROM penjualan_februari)
                    UNION (SELECT * FROM penjualan_maret)
                    ORDER BY tgl_transaksi");
                    while($data = mysqli_fetch_array($tampil)) :
                    ?>
                    <tr>
                        <td><?=$data['kode_obat']?></td>
                        <td><?=$data['tgl_transaksi']?></td>
                        <td><?=$data['jumlah_terjual']?></td>
                    </tr>
                    <?php endwhile; //penutup perulangan while ?>
                </table>
            </div>
        </div>
        <!-- Akhir Tabel -->
        
        

    </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>