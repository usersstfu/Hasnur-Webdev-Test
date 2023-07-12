<?php 
include('header.php');
require('fungsi.php');

$rows = query("SELECT * FROM kursus")[0];
if (isset($_POST["submit"])) {
  if (tambah_kursus($_POST) > 0) {

      echo "
      <script>
          alert('Data berhasil ditambahkan!');
          document.location.href = 'data-kursus.php';
      </script>";
  } else {
      echo "
  <script>
    alert('Data gagal ditambahkan!');
    document.location.href = 'tambah-kursus.php';
  </script>";
  }
}
?>

<?php
include("koneksi.php");
$data = mysqli_query($connection, "SELECT max((id_kursus) + 1) as id_ad FROM kursus");
$row = mysqli_fetch_array($data);
?>
<style>
.card {
  color: white;
}
</style>
<div class="container">

  <div style="margin-top: 5rem;"></div>
  <div class="card mt-5" style="background-color:orangered">
    <div class="card-body">
      <p style="font-size: 120% ;">Tambah Data Kursus</p>
      <br>
      <div class=col-6>
        <form method="POST">
          <table>
            <div class="form-group">
              <label for="idmobil">Id Kursus</label>
              <input type="text" class="form-control" name="id_kursus" placeholder="Masukan Id Kursus"
                value="<?php echo $row['id_ad']; ?>">
            </div>
            <div class="form-group">
              <label for="merk">Id Kategori</label>
              <input type="text" class="form-control" name="id_kategori" placeholder="Masukan Id Kategori" required>
            </div>
            <div class="form-group">
              <label for="harga">Judul</label>
              <input type="text" class="form-control" name="judul" placeholder="Masukan Judul" required>
            </div>
            <div class="form-group">
              <label for="warna">Deskripsi</label>
              <input type="text" class="form-control" name="deskripsi" placeholder=" Masukan Deskripsi" required>
            </div>

            <div class="form-group">
              <label for="tahunpembuatan">Durasi</label>
              <input type="text" class="form-control" name="durasi" placeholder=" Masukan Durasi"
                required>
            </div>
          </table>

          <button type="submit" name="submit" class="btn btn-primary"><span><i
                class="fa fa-user-plus"></i>Submit</button>
          <a href="data-mobil.php" onclick=" return confirm ('Apakah anda ingin membatal data ini?');"><button
              type="button" class="btn btn-danger">
              <span><i class="fa fa-pencil-square-o"></i> Batal</button></span></a>
          <hr>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
include('footer.php');
?>