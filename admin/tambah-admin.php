<?php 
include('header.php');
require('fungsi.php');

if (isset($_POST["submit"])) {
  if (tambah_admin($_POST) > 0) {

      echo "
      <script>
          alert('Data berhasil ditambahkan!');
          document.location.href = 'data-user.php';
      </script>";
  } else {
      echo "
  <script>
    alert('Data gagal ditambahkan!');
    document.location.href = 'tambah-admin.php';
  </script>";
  }
}
?>

<?php
include("koneksi.php");
$data = mysqli_query($connection, "SELECT max((iduser) + 1) as id_ad FROM user");
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
      <p style="font-size: 120% ;">Tambah Data admin</p>
      <br>
      <div class=col-6>
        <form method="POST">
          <table>
            <div class="form-group">
              <label for="iduser">Id Admin</label>
              <input type="text" class="form-control" name="iduser" placeholder="Masukan Id Admin"
                value="<?php echo $row['id_ad']; ?>">
            </div>
            <div class="form-group">
              <label for="namauser">Nama Admin</label>
              <input type="text" class="form-control" name="namauser" placeholder="Masukan Nama Admin" required>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Masukan Username Admin" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder=" Masukan Password Admin"
                required>
            </div>
          </table>

          <button type="submit" name="submit" class="btn btn-primary"><span><i
                class="fa fa-user-plus"></i>Submit</button>
          <a href="data-user.php" onclick=" return confirm ('Apakah anda ingin membatal data ini?');"><button
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