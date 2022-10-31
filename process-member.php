<?php
include ("connection.php");
if (isset($_POST["simpan_member"])) {
    # data input dari user
    $id_member = $_POST["id_member"];
    $nama_member = $_POST["nama_member"];
    $alamat = $_POST["alamat"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tlp = $_POST["tlp"];

    // insert ke tabel petugas
    $sql = "insert into member values
    ('','$nama_member','$alamat','$jenis_kelamin','$tlp')";

    if (mysqli_query($connect, $sql)) {
        header("location:list-member.php");
    } else {
        echo mysqli_error($connect);
    }
    
}

else if (isset($_POST["edit_member"])) {
        # data yg akan diupdate
        $id_member = $_POST["id_member"];
        $nama_member = $_POST["nama_member"];
        $alamat = $_POST["alamat"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $tlp = $_POST["tlp"];

        $sql = "update member set
            nama_member='$nama_member',
            alamat='$alamat',
            jenis_kelamin = '$jenis_kelamin',
            tlp= '$tlp'
            where id_member='$id_member'";

        if (mysqli_query($connect, $sql)) {
            header("location:list-member.php");
        } else {
            echo mysqli_error($connect);
        }

}

?>