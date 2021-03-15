<?php
        //koneksi database
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "apotek";

        $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
        $tampil = mysqli_query($koneksi, "SELECT * From obat");

?>

<!DOCTYPE hmtl>
<html>
<head>
    <title>USER</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1 class="text-center">USER LANDING PAGE</h1>
    <h2 class="text-center">Praktikum SBD</h2>



    <!---- awal card form ---->
    <div class="card mt-3">
    <div class="card-header bg-primary text-white">
        Pencarian Obat
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label>Kode Obat</label>
                <input type="text" name="tkobat" class="form-control" placeholder="Cari Berdasarkan Kode Obat" >
                <button type="submit" class="btn btn-success mt-3" name="bcariko">Cari</button>   
                <button type="reset" class="btn btn-danger mt-3" name="bresetko">Kosongkan</button>  
            </div>

            <div class="form-group mt-3">
                <label>Nama Obat</label>
                <input type="text" name="tnobat" class="form-control" placeholder="Cari Berdasarkan Nama Obat" >
                <button type="submit" class="btn btn-success mt-3" name="bcarino">Cari</button>
                <button type="reset" class="btn btn-danger mt-3" name="bresetno">Kosongkan</button>
            </div>

            <div class="form-group mt-3">
                <label>Bentuk Obat</label>
                <select class="form-control" name="tbobat">
                    <option value="">Cari Berdasarkan Bentuk Obat</option>
                    <option value="Kaplet">Kaplet</option>
                    <option value="Salep">Salep</option>
                    <option value="Syrup">Syrup</option>
                    <option value="Tablet">Tablet</option>
                </select>
                <button type="submit" class="btn btn-success mt-3" name="bcaribo">Cari</button>
                <button type="reset" class="btn btn-danger mt-3" name="bresetbo">Kosongkan</button>
            </div>

            <div class="form-group mt-3">
                <label>Harga Satuan Obat</label>
                <input type="text" name="thsobatmin" class="form-control" placeholder="Cari Berdasarkan Harga Satuan Obat (Masukkan Nilai Minimum)" onkeypress="return event.charCode >= 48 && event.charCode <=57" >
            </div>
        
            <div class="form-group mt-2">
                <input type="text" name="thsobatmax" class="form-control" placeholder="(Masukkan Nilai Maksimum)" onkeypress="return event.charCode >= 48 && event.charCode <=57" >
                <button type="submit" class="btn btn-success mt-3" name="bcariso">Cari</button>
                <button type="reset" class="btn btn-danger mt-3" name="bresetso">Kosongkan</button>
            </div>

        </form>
    </div>
    </div>
    <!--- akhir card form ---->



    <!---- awal card tabel ---->

    <div class="card mt-3">
        <div class="card-header bg-success text-white">
            Daftar Data Obat
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No.</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Bentuk Obat</th>
                    <th>Tanggal Produksi</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Harga Satuan Obat</th>
                    <th>Stok Obat (Pcs)</th>
                </tr>
                
                <?php $x=1;?>
                <?php 

                //kode obat
                if(isset($_POST['bcariko'])){
                    $tampil = mysqli_query($koneksi,"SELECT * FROM obat WHERE kode_obat LIKE '%".$_POST['tkobat']."%'");
                     }  
                
                //nama obat
                if(isset($_POST['bcarino'])){
                    $tampil = mysqli_query($koneksi,"SELECT * FROM obat WHERE nama_obat LIKE '%".$_POST['tnobat']."%'");
                    }  

                //bentuk obat
                if(isset($_POST['bcaribo'])){
                    $tampil = mysqli_query($koneksi,"SELECT * FROM obat WHERE bentuk_obat LIKE '%".$_POST['tbobat']."%'");
                    }  

                //harga satuan obat
                if(isset($_POST['bcariso'])){
                    $tampil = mysqli_query($koneksi,"SELECT * FROM obat WHERE harga_satuan BETWEEN '$_POST[thsobatmin]' AND '$_POST[thsobatmax]' ");
                    } 

                while($row=mysqli_fetch_assoc($tampil)): ?>

                <tr>
                    <td><?php echo $x; ?></td>
                    <td><?= $row["kode_obat"]; ?></td>
                    <td><?= $row["nama_obat"]; ?></td>
                    <td><?= $row["bentuk_obat"]; ?></td>
                    <td><?= $row["tgl_produksi"]; ?></td>
                    <td><?= $row["tgl_kadaluarsa"]; ?></td>
                    <td><?= $row["harga_satuan"]; ?></td>
                    <td><?= $row["jumlah_sedia"]; ?></td>
                </tr>
                <?php $x++;?>
                <?php endwhile; ?>
            </table>
        </div>
        </div>


    <!--- akhir card tabel ---->

    </div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>