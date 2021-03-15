<?php
/**
 * Koneksi ke MySQL
 */

$databaseHost = 'localhost';
$databaseName = 'apotek';
$databaseUsername = 'root';
$databasePassword = '';

$koneksi = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName) or die (mysqli_error($koneksi));

//jika tombol simpan diklik
if(isset($_POST['bsimpan'])){

    //Pengujian apakah data akan di edit atau disimpan baru
    if($_GET['hal'] == "edit")
    {
        //Data akan di edit
        $edit = mysqli_query($koneksi, "UPDATE obat SET 
                                        kode_obat = '$_POST[tkd_obat]',
                                        nama_obat = '$_POST[tnama]',
                                        bentuk_obat = '$_POST[tbentuk]',
                                        tgl_produksi = '$_POST[tproduksi]',
                                        tgl_kadaluarsa = '$_POST[tkadaluarsa]',
                                        harga_satuan = $_POST[tharga],
                                        jumlah_sedia = $_POST[tpersediaan]
                                        WHERE kode_obat = '$_GET[id]'
                                        ");

         if($edit) //jika edit sukses
        {
            $waktu = mysqli_fetch_array(mysqli_query($koneksi, "SELECT updated FROM obat WHERE kode_obat = '$_GET[id]'"));
            $vwaktu = $waktu['updated'];

            $host = mysqli_fetch_array(mysqli_query($koneksi, "SELECT host FROM obat WHERE kode_obat = '$_GET[id]'"));
            $vhost = $host['host'];

            echo "<script>
                alert('Data Obat berhasil di UPDATE, Dimodifikasi: $vwaktu, Nama Host: $vhost');
                document.location='obat.php';
            </script>";
        }
        else //jika edit gagal
        {
            echo "<script>
                alert('Edit data GAGAL!');
                document.location='obat.php';
            </script>";
        }

    }
    else {
        //data akan disimpan baru
        $simpan = mysqli_query($koneksi, "INSERT INTO obat (kode_obat, nama_obat, bentuk_obat, tgl_produksi, tgl_kadaluarsa, harga_satuan, jumlah_sedia)
        VALUES ('$_POST[tkd_obat]','$_POST[tnama]','$_POST[tbentuk]','$_POST[tproduksi]','$_POST[tkadaluarsa]',$_POST[tharga],$_POST[tpersediaan])");

        //jika simpan data sukses atau gagal
         if($simpan)
        {
            echo "<script>
                alert('Simpan data sukses');
                document.location='obat.php';
            </script>";
        }
        else
        {
            echo "<script>
                alert('Simpan data GAGAL!');
                document.location='obat.php';
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

//pengujian jika tombol edit/hapus di klik
if(isset($_GET['hal']))
{
    //pengujian jika edit data
    if($_GET['hal'] == "edit")
    {
        //tampilkan data yang akan di edit
        $tampil = mysqli_query($koneksi, "SELECT * FROM obat WHERE kode_obat = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);
        if($data)
        {
            //jika data ditemukan, maka data ditampung dulu kedalam variabel
            $vkode_obat = $data['kode_obat'];
            $vnama_obat = $data['nama_obat'];
            $vbentuk_obat = $data['bentuk_obat'];
            $vtgl_produksi = $data['tgl_produksi'];
            $vtgl_kadaluarsa = $data['tgl_kadaluarsa'];
            $vharga_satuan = $data['harga_satuan'];
            $vjumlah_sedia = $data['jumlah_sedia'];
        }
    }

    //pengujian jika hapus data
    elseif($_GET['hal'] == "hapus")
    {
        //hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM obat WHERE kode_obat = '$_GET[id]' ");

        if($hapus)
        {
            echo "<script>
                alert('Hapus data sukses');
                document.location='obat.php';
            </script>";
        }
        else
        {
            echo "<script>
                alert('Hapus data GAGAL!');
                document.location='obat.php';
            </script>";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Obat</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <!-- Header website -->
        <h1 class="text-center">Data Obat-Obatan Apotek</h1>

        <!-- Menu ke Tabel Transaksi -->
        <form action="transaksi.php" method="post" class="mt-5">
            <div>
                <button type="KeTransaksi" class="btn btn-info">Menuju Tabel Transaksi</button>
            </div>
        </form>

        <!-- Awal Card Form -->
        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                Form Input Data Obat
            </div>
            <div class="card-body">
               <form method="post" action="">
                   <!-- Form Kode Obat -->
                   <div class="form-group">
                       <label>Kode Obat</label>
                       <input type="text" name="tkd_obat" value="<?=@$vkode_obat?>" class="form-control" placeholder="Input Kode Obat" required>
                   </div>
                   <!-- Form Nama Obat -->
                   <div class="form-group">
                       <label>Nama Obat</label>
                       <input type="text" name="tnama" value="<?=@$vnama_obat?>" class="form-control" placeholder="Input Nama Obat" required>
                   </div>
                   <!-- Form Bentuk Obat-->
                    <div>
                        <label>Bentuk Obat:</label>
                        <select class="form-control" name="tbentuk" required>
                            <option value="<?=@$vbentuk_obat?>"><?=@$vbentuk_obat?></option>
                            <option value="SYRUP">SYRUP</option>
                            <option value="KAPLET">KAPLET</option>
                            <option value="TABLET">TABLET</option>
                            <option value="SALEP">SALEP</option>
                        </select>
                    </div>
                    <!-- Form Tanggal Produksi -->
                    <div>
                        <label>Tanggal Produksi</label>
                        <input type="date" name="tproduksi" value="<?=@$vtgl_produksi?>" class="form-control" required>
                    </div>
                    <!-- Form Tanggal Kadaluarsa -->
                    <div>
                        <label>Tanggal Kadaluarsa</label>
                        <input type="date" name="tkadaluarsa" value="<?=@$vtgl_kadaluarsa?>" class="form-control" required>
                    </div>
                    <!-- Form Harga Satuan -->
                    <div>
                        <label>Harga Satuan</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" name="tharga" value="<?=@$vharga_satuan?>" class="form-control" aria-label="Jumlah">
                        </div>
                    </div>
                    <!-- Form Persediaan -->
                    <div>
                        <label>Persediaan</label>
                        <input type="number" name="tpersediaan" value="<?=$vjumlah_sedia?>" id="jumlah_sedia" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                        <button type="reset" class="btn btn-danger" name="breset">Reset</button>
                    </div>
               </form>  
            </div>
        </div>
        <!-- Akhir Card Form -->

        <!-- Awal Tabel Obat -->
        <div class="card mt-3">
            <div class="card-header bg-success text-white">
                Tabel Data Obat
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <!-- Nama Tabel -->
                    <tr>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Bentuk Obat</th>
                        <th>Tanggal Produksi</th>
                        <th>Tanggal Kadaluarsa</th>
                        <th>Harga Satuan</th>
                        <th>Action</th>
                    </tr>

                    <!-- Data Tabel -->
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM obat ORDER BY kode_obat asc");
                    while($data = mysqli_fetch_array($tampil)) :
                    ?>
                    <tr>
                        <td><?=$data['kode_obat']?></td>
                        <td><?=$data['nama_obat']?></td>
                        <td><?=$data['bentuk_obat']?></td>
                        <td><?=$data['tgl_produksi']?></td>
                        <td><?=$data['tgl_kadaluarsa']?></td>
                        <td>Rp.<?=$data['harga_satuan']?></td>
                        <td>
                            <a href="obat.php?hal=edit&id=<?=$data['kode_obat']?>" class="btn btn-warning">Edit</a>
                            <a href="obat.php?hal=hapus&id=<?=$data['kode_obat']?>" 
                            onclick="return confirm('Apakah anda yakin ingin mengahapus data ini?')" 
                            class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; //penutup perulangan while ?>
                </table>

            </div>
        </div>
        <!-- Akhir Tabel Obat -->

        <!-- Awal Tabel Persediaan -->
        <div class="card mt-3">
            <div class="card-header bg-success text-white">
                Tabel Data Persediaan
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <!-- Nama Tabel -->
                    <tr>
                        <th>Kode Obat</th>
                        <th>Jumlah Sedia</th>
                        <th>Action</th>
                    </tr>

                    <!-- Data Tabel -->
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM obat ORDER BY kode_obat asc");
                    while($data = mysqli_fetch_array($tampil)) :
                    ?>
                    <tr>
                        <td><?=$data['kode_obat']?></td>
                        <td><?=$data['jumlah_sedia']?></td>
                        <td>
                            <a href="obat.php?hal=edit&id=<?=$data['kode_obat']?>" class="btn btn-warning">Edit</a>
                            <a href="obat.php?hal=hapus&id=<?=$data['kode_obat']?>" 
                            onclick="return confirm('Apakah anda yakin ingin mengahapus data ini?')" 
                            class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; //penutup perulangan while ?>
                </table>

            </div>
        </div>
        <!-- Akhir Tabel Persediaan -->

        

    </div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>