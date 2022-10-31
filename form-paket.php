<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Paket</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php include("home.php")?>
    <div class="container">
        <div class="card">
            <div class="card-header bg-success">
                <h4 class="text-white">Form Paket</h4>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET["id_paket"])) {
                    include "connection.php";
                    $id_paket = $_GET["id_paket"];
                    $sql = "select * from paket where id_paket= '$id_paket'";
                    # eksekusi perintah SQL
                    $hasil = mysqli_query($connect, $sql);
                    #konversi hasil query ke bentuk array
                    $paket = mysqli_fetch_array($hasil);
                    ?>

                    <form action="process-paket.php" method="post">

                        Id Paket
                        <input type="number" name="id_paket" 
                        class="form-control mb-2" readonly 
                        value="<?=($paket["id_paket"])?>">


                        Jenis Paket
                        <select name="jenis" class="form-control mb-2"
                        required>
                                <option value="<?=$paket["jenis"]?>" selected>
                                    <?=$paket["jenis"]?>
                                </option>
                                <option value="kiloan">Kiloan</option>
                                <option value="selimut">Selimut</option>
                                <option value="bed_cover">Bed Cover</option>
                                <option value="kaos">Kaos</option>
                        </select>

                        Harga
                        <input type="number" name="harga" 
                        class="form-control mb-2" required 
                        value="<?=($paket["harga"])?>">

                        <button type="submit" 
                        class="btn btn-success btn block"
                        name="edit_paket">
                            Simpan
                        </button>
                    </form>

                    <?php
                }else {
                    ?>
                    <form action="process-paket.php" method="post">
                        
                        Jenis Paket
                        <select name="jenis" class="form-control mb-2"
                        required>
                                <option value="kiloan">Kiloan</option>
                                <option value="selimut">Selimut</option>
                                <option value="bed_cover">Bed Cover</option>
                                <option value="kaos">Kaos</option>
                        </select>

                        Harga
                        <input type="number" name="harga" 
                        class="form-control mb-2" required >

                        <button type="submit" 
                        class="btn btn-success btn block"
                        name="simpan_paket">
                            Simpan
                        </button>
                    </form>
                    <?php
                }
                 ?>
            </div>
        </div>
    </div>
</body>
</html>