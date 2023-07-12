<?php
include('header.php');
require 'fungsi.php';

$id = isset($_GET["id_kategori"]) ? $_GET["id_kategori"] : null;
$rows = query("SELECT * FROM kategori WHERE id_kategori = '$id'");

if (empty($rows)) {
    // Proses jika data tidak ditemukan
    echo "
    <script>
        alert('Data kategori tidak ditemukan!');
        document.location.href = 'data-kategori.php';
    </script>";
    exit;
}

$data = !empty($rows) ? $rows[0] : array();

if (isset($_POST["submit"])) {
    if (ubah_kategori($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil diubah!');
            document.location.href = 'data-kategori.php';
        </script>";
        exit;
    } else {
        echo "
        <script>
            alert('Data gagal diubah!');
            document.location.href = 'ubah-kategori.php?id_kategori=$id';
        </script>";
        exit;
    }
}
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
      <p style="font-size: 120% ;">Ubah Data Kategori</p>
      <br>
      <div class=col-6>
        <form method="POST">
          <table>
            <div class="form-group">
              <label for="id_kategori">Id Kategori</label>
              <input type="text" class="form-control" name="id_kategori" placeholder="Masukan Id Kategori"
                value="<?= isset($data["id_kategori"]) ? $data["id_kategori"] : '' ?>">
            </div>
            <div class="form-group">
              <label for="jenis_kategori">Jenis Kategori</label>
              <input type="text" class="form-control" name="jenis_kategori" placeholder="Masukan Jenis Kategori"
                value="<?= isset($data["jenis_kategori"]) ? $data["jenis_kategori"] : '' ?>">
            </div>
          </table>

          <button type="submit" name="submit" class="btn btn-primary"><span><i
                class="fa fa-user-plus"></i>Submit</button>
          <a href="data-kategori.php" onclick=" return confirm ('Apakah anda ingin membatalkan perubahan ini?');"><button
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