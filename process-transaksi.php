<?php
include("connection.php");
# menampung data yang dikirim
$id_member = $_POST["id_member"];
$tgl = $_POST["tgl"];
$batas_waktu = $_POST["batas_waktu"];
$id_user = $_POST["id_user"];
$id_paket = $_POST["id_paket"];
$qty = $_POST["qty"];

$tgl_bayar = null;
$total = 0;

$sql = "select * from paket where id_paket ='$id_paket'";
$hasil = mysqli_query($connect, $sql);
$package = mysqli_fetch_array($hasil);
$biaya = $package["harga"];

$total += $qty * $biaya;

# perintah SQL untuk insert ke table transaksi
$sql = "insert into transaksi values
('','$id_member','$tgl','$batas_waktu','$tgl_bayar','baru','belum_dibayar','$id_user','$total')";

if (mysqli_query($connect, $sql)) {
    # jika berhasil insert ke tabel transaksi
    # insert ke tabel detil transaksi
    header("location:list-transaksi.php");
}else{
    # jia gagal insert tabel sewa
    echo mysqli_error($connect);
}
?>