<?php
include 'server/koneksi.php';


$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM p_alat WHERE id='$id'");
 
header("location:index.php?pesan=hapus");
?>