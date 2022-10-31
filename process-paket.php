<?php
include "connection.php";
if (isset($_POST["simpan_paket"])) {
    # menampung data yg dikirim ke dalam variable
    $id_paket = $_POST["id_paket"];
    $jenis = $_POST["jenis"];
    $harga = $_POST["harga"];

    # proses insert data ke tabel paket
    $sql = "insert into paket values
    ('$id_paket','$jenis','$harga')";

    # eksekusi perintah SQL
    mysqli_query($connect, $sql);

    echo "Tambah data paket berhasil";
    # direct ke halaman list mobil
    header("location:list-paket.php");

}
elseif (isset($_POST["edit_paket"])) {
    # menampung data yg dikirim ke dalam variable
    # tampung data yg akan diupdate
    $id_paket = $_POST["id_paket"];
    $jenis = $_POST["jenis"];
    $harga = $_POST["harga"];

    # perintah SQL update ke table paket
    $sql = "update paket set jenis='$jenis',
    harga='$harga' where id_paket='$id_paket'";

    # eksekusi perintah SQL
    mysqli_query($connect, $sql);

    # direct / dikembalikan ke halaman list paket
    header("location:list-paket.php");
}

?>