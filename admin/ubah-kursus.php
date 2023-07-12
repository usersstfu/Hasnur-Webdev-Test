<?php 
include('header.php');
require('fungsi.php');

$id = isset($_GET["id_kursus"]) ? intval($_GET["id_kursus"]) : 0;
$rows = query("SELECT * FROM kursus WHERE id_kursus = $id");

if (empty($rows)) {
    // Proses jika data tidak ditemukan
    echo "
    <script>
        alert('Data kursus tidak ditemukan!');
        document.location.href = 'data-kursus.php';
    </script>";
    exit;
}

$data = $rows[0];

if (isset($_POST["submit"])) {
    if (ubah_kursus($_POST, $id) > 0) {
        echo "
        <script>
            alert('Data berhasil diubah!');
            document.location.href = 'data-kursus.php';
        </script>";
        exit;
    } else {
        echo "
        <script>
            alert('Data gagal diubah!');
            document.location.href = 'ubah-kursus.php?id_kursus=$id';
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
      <p style="font-size: 120%;">Ubah Data Kursus</p>
      <br>
      <div class="col-6">
        <form method="POST">
          <table>
            <div class="form-group">
              <label for="id_kursus">Id Kursus</label>
              <input type="text" class="form-control" name="id_kursus" placeholder="Masukkan Id Kursus"
                value="<?= $data['id_kursus'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="id_kategori">Id Kategori</label>
              <input type="text" class="form-control" name="id_kategori" placeholder="Masukkan Id Kategori"
                value="<?= $data['id_kategori'] ?>">
            </div>
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul"
                value="<?= $data['judul'] ?>">
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi"
                value="<?= $data['deskripsi'] ?>">
            </div>
            <div class="form-group">
              <label for="durasi">Durasi</label>
              <input type="text" class="form-control" name="durasi" placeholder="Durasi"
                value="<?= $data['durasi'] ?>">
            </div>
</table>
          <button type="submit" name="submit" class="btn btn-primary"><span><i
                class="fa fa-user-plus"></i>Submit</button>
          <a href="data-kursus.php" onclick=" return confirm ('Apakah anda ingin membatal data ini?');"><button
              type="button" class="btn btn-danger">
              <span><i class="fa fa-pencil-square-o"></i> Batal</button></span></a>
        </form>
<?php 
include('footer.php');
?>