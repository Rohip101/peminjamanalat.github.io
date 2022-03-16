<?php
  include "server/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="style/style.css" />
    <title>Peminjaman Alat</title>
  </head>
<body>
  <div>

  </div>
  <div class="container-md">
  <div align="center"><br>
    <h3>Peminjaman Alat</h3>

    <a class="btn btn-primary" href="form.php">Pinjam Alat</a>
    <br><br>
     <!--menampilkan data di tabel-->
     <table class="table table-bordered">
      <tr>
        <th>No</th>
       <th>NIS</th>
       <th>Nama</th>
       <th>No Whatsapp</th>
       <th>Alat</th>
       <th>Jumlah</th>
       <th>Waktu Peminjaman</th>
       <th>aksi</th>
      </tr>
      <?php


      $i=1;

      //ambil data dari tabel p_alat
      $sql = ("SELECT * FROM p_alat");
      $query = mysqli_query($koneksi, $sql);

      $data = mysqli_fetch_array($query);


      while ($data = mysqli_fetch_array($query)) {
      ?>
       <tr>
        <td><?=$i++;?></td>
        <td><?=$data['nis']; ?></td>
        <td><?=$data['nama']; ?></td>
        <td><?=$data['no_wa']; ?></td>
        <td><?=$data['alat']; ?></td>
        <td><?=$data['jumlah']; ?></td>
        <td><?= date('d F Y, H:i:s', strtotime($data["wpinjam"])); ?></td>

        <td> <a class="btn btn-danger btn-sm" href="hapus.php?id=<?= $data["id"]; ?>"onclick="return confirm('yakin?');">Hapus</a></td>
       </tr>
      <?php 
      }
      ?>  
     </table>
  </div>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>