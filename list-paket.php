<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Member Laundry</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php include("home.php")?>
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="text-white text-center">
                    Daftar Paket
                </h3>
            </div>

            <div class="card-body">
                <form action="list-paket.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-2" placeholder="cari">
                </form>

                <ul class="list-group"> 
                <?php
                include("connection.php");
                if (isset($_GET["search"])) {
                    $cari = $_GET["search"];
                    $sql = "select * from paket where
                    id_paket like '%$cari%'
                    or jenis like '%$cari%'
                    or harga like '%$cari%'";
                }else{
                    $sql = "select * from paket";
                }

                # eksekusi SQL
                $hasil = mysqli_query($connect, $sql);
                while ($paket = mysqli_fetch_array($hasil)) {
                ?>
                    <li class="list-group-item ">
                        <div class="row">

                            <div class="col-lg-10 mt-2">
                                <!-- untuk deskripsi -->
                                <h6>ID : <?=$paket["id_paket"]?></h6>
                                <h6>Jenis: <?=$paket["jenis"]?></h6>
                                <h6>harga : <?=$paket["harga"]?></h6>
                            </div>

                            <div class="col-lg-2">
                                <a href="form-paket.php?id_paket=<?=$paket["id_paket"]?>">
                                    <button class="btn btn-info btn-block mb-2">
                                        Edit
                                    </button>
                                </a>

                                <a href="delete-paket.php?id_paket=<?=$paket["id_paket"]?>"
                                onClick="return confirm('Apakah anda yakin?')">
                                    <button class="btn btn-danger btn-block">
                                        Delete
                                    </button>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php
                }
                ?>
                </ul>
            </div>
            <div class="card-footer">
                <a href="form-paket.php">
                    <button class="btn btn-success form-control"> 
                        Tambah Paket
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>