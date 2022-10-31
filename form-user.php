<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form User</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <?php include("home.php")?>
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white">Form User</h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id"])){
                    // memeriksa ketika load file ini,
                    // apakah membawa data GET dengan nama id_user
                    // jika ture, maka form anggota digunakan untuk edit

                    # mengakses data anggota dari id_anggota yg dikirim
                    include "connection.php";
                    $id = $_GET["id"];
                    $sql = "select * from user where id='$id'";
                    // eksekusiperintah SQL
                    $hasil = mysqli_query($connect, $sql);
                    # konversi hasil query ke bentuk array
                    $user = mysqli_fetch_array($hasil);
                    ?>

                    <form action="process-user.php" method="post"
                    onsubmit="return confirm('yakin?')">

                        ID User
                        <input type="number" name="id_user"
                        class="form-control mb-2" readonly
                        value="<?=$user["id_user"];?>">

                        Nama User
                        <input type="text" name="nama_user"
                        class="form-control mb-2" required
                        value="<?=$user["nama_user"];?>">

                        Username
                        <input type="text" name="username"
                        class="form-control mb-2" required
                        value="<?=$user["username"];?>">

                        Password
                        <input type="password" name="password"
                        class="form-control mb-2"
                        value="<?=$user["password"];?>">

                        Role
                        <select name="role" 
                        class="form-control mb-2" required>
                        <option value="admin">admin</option>
                        <option value="kasir">kasir</option>
                        </select>

                    <button type="submit" class="btn btn-success btn-block"
                    name="edit_user">
                        Simpan
                    </button>
                    </form>
                    <?php
                }else{

                    // jika false, maka form user digunakan untuk insert
                    ?>
                    <form action="process-user.php" method="post">

                    Nama User
                    <input type="text" name="nama_user" 
                    class="form-control mb-2" required />

                    Username
                    <input type="text" name="username" 
                    class="form-control mb-2" required />

                    Password
                    <input type="password" name="password" 
                    class="form-control mb-2" required />

                    Role
                    <select name="role" 
                    class="form-control mb-2" required>
                    <option value="admin">admin</option>
                    <option value="kasir">kasir</option>
                    </select>


                    <button type="submit"
                    class="btn btn-success btn-block"
                    name="simpan_user">
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