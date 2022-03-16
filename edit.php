<?php
include 'server/koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM p_alat WHERE id = $id";
$result = mysqli_query($koneksi, $query);

$data = mysqli_fetch_array($result);


if(isset($_POST["kirim"])) {

  //ambil data dari formulir
  $id = $data["id"];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $no_wa = $_POST['no_wa'];
  $alat = implode(", ", $_POST['alat']);
  $jumlah = $_POST['jumlah'];

  //buat query
  $sql = "UPDATE p_alat SET
  nis = '$nis',
  nama = '$nama',
  no_wa = '$no_wa',
  alat = '$alat',
  jumlah = '$jumlah',
  date_date=now()
  WHERE id = '$id'
  ";
  $query = mysqli_query($koneksi, $sql);
  return mysqli_affected_rows($koneksi);

  if ($query) {
    header("location: index.php");
  }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="/style/style.css" />
    <title>Peminjaman Alat</title>
  </head>
  <body>
    <!-- <div class="gambar"></div> -->

    <div class="card col-sm-4 mx-auto mt-5">
      <h5 class="card-header bg-transparent">Edit Data Peminjaman Alat</h5>
      <div class="card-body ">
        <form action="" method="post">
          <fieldset>
            <div class="mb-3">
            <input type="hidden" name="id" value="<?= $data["id"]; ?>">
              <label for="nis" class="form-label fw-bold">NIS</label>
              <input type="text" name="nis" id="nis" class="form-control" placeholder="Nomor Induk Siswa"  value="<?= $data["nis"]; ?>" required/>
            </div>

            <div class="mb-3">
              <label for="nama" class="form-label fw-bold">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $data["nama"]; ?>" required/>
            </div>
            <div class="mb-3">
              <label for="no_wa" class="form-label fw-bold" >Nomor Whatsapp</label>
              <input type="text" name="no_wa" id="no_wa" class="form-control" placeholder="Nomor Kamu :3" value="<?= $data["no_wa"]; ?>" required/>
            </div>
            <p>Alat Yang Dipinjam :</p>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" name="alat[]" type="checkbox" id="disabledFieldsetCheck" value="<?= $data["alat"]; ?>"/>
                <label class="form-check-label" for="disabledFieldsetCheck">Tang</label>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" name="alat[]" type="checkbox" id="disabledFieldsetCheck" value="<?= $data["alat"]; ?>"  />
                <label class="form-check-label" for="disabledFieldsetCheck">Harddisk</label>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" name="alat[]" type="checkbox" id="disabledFieldsetCheck" value="<?= $data["alat"]; ?>" />
                <label class="form-check-label" for="disabledFieldsetCheck">SSD</label>
              </div>
            </div>
            <div class="mb-3">
              <label for="jumlah" class="form-label fw-bold">Jumlah Alat</label>
              <input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="Angka" value="<?= $data["jumlah"]; ?>" required/>
            </div>
            <!-- <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" />
                <label class="form-check-label" for="disabledFieldsetCheck"> Anda Menyetujui S&K </label>
              </div>
            </div> -->

            <button type="submit" class="btn btn-warning" name="simpan">Ubah Data</button>
          </fieldset>
        </form>
        
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
