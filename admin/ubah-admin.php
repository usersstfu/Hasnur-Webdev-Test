<?php
include('header.php');
require 'fungsi.php';

$id = isset($_GET["iduser"]) ? intval($_GET["iduser"]) : 0;
$rows = query("SELECT * FROM user WHERE iduser = $id");

if (empty($rows)) {
    // Proses jika data tidak ditemukan
    echo "
    <script>
        alert('Data admin tidak ditemukan!');
        document.location.href = 'data-user.php';
    </script>";
    exit;
}

$data = $rows[0];

if (isset($_POST["submit"])) {
    if (ubah_admin($_POST, $id) > 0) {
        echo "
        <script>
            alert('Data berhasil diubah!');
            document.location.href = 'data-user.php';
        </script>";
        exit;
    } else {
        echo "
        <script>
            alert('Data gagal diubah!');
            document.location.href = 'ubah-admin.php?iduser=$id';
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
      <p style="font-size: 120%;">Ubah Data Admin</p>
      <br>
      <div class="col-6">
        <form method="POST">
          <table>
            <div class="form-group">
              <label for="iduser">Id Admin</label>
              <input type="text" class="form-control" name="iduser" placeholder="Masukkan Id Admin"
                value="<?= $data['iduser'] ?>" readonly>
            </div>
            <div class="form-group">
              <label for="namauser">Nama Admin</label>
              <input type="text" class="form-control" name="namauser" placeholder="Masukkan Nama Admin"
                value="<?= $data['namauser'] ?>">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Masukkan Username Admin"
                value="<?= $data['username'] ?>">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" class="form-control" name="password" placeholder="Masukkan Password Admin"
                value="<?= $data['password'] ?>">
            </div>
          </table>
          <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
          <a href="data-user.php" onclick="return confirm('Apakah anda ingin membatalkan perubahan ini?');"><button type="button" class="btn btn-danger">Batal</button></a>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
include('footer.php');
?>