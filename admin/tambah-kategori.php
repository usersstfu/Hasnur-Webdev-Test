<?php 
include('header.php');
require('fungsi.php');

if (isset($_POST["submit"])) {
  if (tambah_kategori($_POST) > 0) {

      echo "
      <script>
          alert('Data berhasil ditambahkan!');
          document.location.href = 'data-kategori.php';
      </script>";
  } else {
      echo "
  <script>
    alert('Data gagal ditambahkan!');
    document.location.href = 'tambah-kategori.php';
  </script>";
  }
}
?>

<?php
include("koneksi.php");
$data = mysqli_query($connection, "SELECT max((id_kategori) + 1) as id_ad FROM kategori");
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
      <p style="font-size: 120% ;">Tambah Data Kategori</p>
      <br>
      <div class=col-6>
        <form method="POST">
          <table>
            <div class="form-group">
              <label for="idpembeli">Id Kategori</label>
              <input type="text" class="form-control" name="idpembeli" placeholder="Masukan Id Pembeli"
                value="<?php echo $row['id_ad']; ?>">
            </div>
            <div class="form-group">
              <label for="noktp">Jenis Kategori</label>
              <input type="text" class="form-control" name="noktp" placeholder="Masukan Jenis Kategori" required>
            </div>
          </table>

          <button type="submit" name="submit" class="btn btn-primary"><span><i
                class="fa fa-user-plus"></i>Submit</button>
          <a href="data-pembeli.php" onclick=" return confirm ('Apakah anda ingin membatal data ini?');"><button
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