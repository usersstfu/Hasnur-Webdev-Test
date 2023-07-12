<?php
include 'header.php';
?>

<style>
.cari {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-end;
}

@media screen and (max-width:576px) {
  .cari {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
  }
}
</style>
<div class="container-lg" style="margin-top: 1.5rem">


  <div class="row">
    <div class="col-sm">
      <p style="font-size: 150%">Data Kursus-Kursus yang Ada</p>
    </div>
    <div class="col-sm">
      <div class="cari right">
        <form action="" method="post" class="form-inline">
          <div class="input-group">
            <input class="form-control mr-lg-2 mb-2" type="text" name="keyword" placeholder="Search" autocomplete="off"
              style="height: 2.2rem;" autofocus>
          </div>
          <div class="input-group-append">
            <button type="submit" name="cari" class="btn btn-success mb-2">Cari</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <h5 align="left"><a href="tambah-kursus.php"><button type="button" class="btn btn-success">
            <span><i class="fa fa-user-plus"></i>Tambah Data</button></a></span></h5><br>
      <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
    </div>
  </div>
  <thead class="thead-dark">
    <tr align="center">
      <th>Id Kursus</th>
      <th>Id Kategori</th>
      <th>Judul</th>
      <th>Deskripsi</th>
      <th>Durasi</th>
      <th>Aksi</th>
    </tr>
  </thead>

  <?php
        $batas=4;
        $halaman = @$_GET['halaman'];
        if (empty($halaman)){
            $posisi =0;
            $halaman =1;
        }
        else {
            $posisi = ($halaman-1)*$batas;
        }

        require("../koneksi.php"); 

        $no=1+$posisi;

        if(isset($_POST['cari'])){
            $keyword=$_POST['keyword'];
            $data = mysqli_query($connection,"SELECT * FROM kursus WHERE id_kursus LIKE '%$keyword%' OR judul
                LIKE '%$keyword%' LIMIT $posisi, $batas");
        } else{
            $data = mysqli_query($connection,"SELECT * FROM kursus LIMIT $posisi, $batas");

        }
        $i =1;
        while($row = mysqli_fetch_array($data)){ 
            ?>
  <tr>
    <td>
      <center><?php echo $row['id_kursus']; ?></center>
    </td>
    <td>
      <center><?php echo $row['id_kategori']; ?></center>
    </td>
    <td>
      <center><?php echo $row['judul']; ?></center>
    </td>
    <td>
      <center><?php echo $row['deskripsi']; ?></center>
    </td>
    <td>
      <center><?php echo $row['durasi']; ?></center>
    </td>
    <td align="center">

      <a href="ubah-kursus.php?id_kursus=<?php echo $row['id_kursus']; ?>"><button type="button" class="btn btn-primary"
          onclick=" return confirm ('Apakah anda ingin mengedit data ini?');">
          <span><i class="fa fa-pencil-square-o"></i> Edit</button></span></a>
      <a href="hapus-kursus.php?id_kursus=<?php echo $row['id_kursus']; ?>"
        onclick=" return confirm ('Apakah anda ingin menghapus data ini?');"><button type="button"
          class="btn btn-danger">
          <span><i class="fa fa-trash"></i> Hapus</button></span></a>
    </td>
  </tr>

  <?php
    $no++;
    }
  ?>

  </table>
  <?php
    $query2 = mysqli_query($connection, 'SELECT * FROM kursus');
    $jmldata = mysqli_num_rows($query2);
    $jmlhalaman = ceil($jmldata / $batas);
    
    ?>

  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <?php
            for ($i = 1; $i <= $jmlhalaman; $i++) {
                if ($i != $halaman) {
                    echo "<li class='page-item'><a class='page-link' href='data-mobil.php?halaman=$i'>$i</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                }
            }
            
            ?>
    </ul>
  </nav>

</div>
</body>

</html>
</div>
</div>



<?php
include 'footer.php';
?>