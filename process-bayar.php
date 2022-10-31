<?php
include("connection.php");
# menampung data yang dikirim
$id_transaksi = $_GET["id_transaksi"];
$tgl_bayar = date("Y-m-d H:i:s");

$sql = "update transaksi set tgl_bayar = '$tgl_bayar' where id_transaksi = '$id_transaksi'";

if (mysqli_query($connect, $sql)) {
    header("location:list-transaksi.php");
} else {
    echo mysqli_error($connect);
}
?>