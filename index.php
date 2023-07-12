<?php
require 'functions.php';
$car = query("SELECT * FROM kursus JOIN kategori USING(id_kategori)");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Autoshop</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="Free HTML Templates" name="keywords" />
  <meta content="Free HTML Templates" name="description" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet" />


  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
  <link href="assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="assets/css/style.css" rel="stylesheet" />
  <style>


  .btn-secondary:hover {
    background-color: #ffbb00;
  }

  .btn-primary {
    background-color: #ffbb00;
    color: white;

  }

  .btn-primary:hover {
    border: 2px solid black;
  }

  * {
    scroll-behavior: smooth;
    transition: 1.5s;
  }
  </style>

</head>

<body>
  <!-- Navbar Start -->
  <div class="container-fluid bg-light position-relative shadow">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
      <a href="index.php" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
        <span class="text-primary">Yayasan Hasnur Centre</span>
      </a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav font-weight-bold mx-auto py-0">
          <a href="index.php" class="nav-item nav-link active">Home</a>
          </div>

        </div>
        <a href="admin/login.php" class="btn btn-primary px-4">Admin</a>
      </div>
    </nav>
  </div>
  <!-- Navbar End -->

  <!-- Header Start -->
  <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
    <div class="row align-items-center px-3">
      <div class="col-lg-6 text-center text-lg-left">
        <h4 class="text-white mb-4 mt-5 mt-lg-0">Yayasan Hasnur Centre Learning</h4>
        <h1 class="display-3 font-weight-bold text-white">
          Temukan Online Course Terbaik di Indonesia
        </h1>
        <p class="text-white mb-4">
          Bersiaplah mencapai tujuan Anda dengan pelajaran terbaik yang disediakan
        </p>
        <a href="#mobil" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a>
      </div>
      <div class="col-lg-6 text-center text-lg-right">
        <img class="img-fluid mt-5" src="assets/img/YHC-2019.png" alt="" />
      </div>
    </div>
  </div>

  <!-- Header End -->

  <!-- Class Start -->
  <div class="container-fluid pt-5">
    <div class="container">
      <div class="text-center pb-2 mt-5">
        <p class="section-title px-5">
          <span class="px-2" id="mobil">Course - Course </span>
        </p>
        <h1 class="mb-4">Kursus-Kursus Terbaru</h1>
      </div>

      <div class="est">
        <?php $i =1; ?>
        <?php foreach ($car as $row) : ?>
        <div class="col-lg-4 mt-3">
          <div class="card border-0 bg-light shadow pb-2 mt-5">
            <!-- <img class="card-img-top mb-10" src="assets/img/<?= $row["gambar"]; ?>" width="150px"> -->
            <div class="card-footer bg-transparent py-4 px-5">
              <div class="row border-bottom text-center">
                <div class="col py-1 "><?= $row["judul"]; ?></div>
              </div>
              <div class="row border-bottom">
                <div class="col-6 py-1 text-right ">
                  <strong>Durasi</strong>
                </div>
                <div class="col-6 py-1"><?= $row["durasi"]; ?></div>
              </div>
              <div class="row border-bottom">
                <div class="col-6 py-1 text-right ">
                  <strong>Deskripsi
                  </strong>
                </div>
                <div class="col-6 py-1"><?= $row["deskripsi"]; ?></div>
              </div>
              <div class="row border-bottom">
              </div>
              <div class="row">
              </div>
            </div>
            <a href="materi.php?id=<?=$row["id_kursus"]; ?>" class="btn btn-primary px-4 mx-auto mb-4">Pelajari
              Selengkapnya</a>
          </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <?php $i++; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- Class End -->

  <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
    <div class="row pt-5">
      <div class="col-lg-3 col-md-6 mb-5">
        <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0"
          style="font-size: 40px; line-height: 40px">
          <i class="flaticon-043-teddy-bear"></i>
          <span class="text-white">Yayasan Hasnur Centre Learning</span>
        </a>
        <p>
          Jl. Brigjend H. Hasan Basri Ray 5 No.Km. 11, RT.02/RW.01, Handil Bakti, Kec. Alalak,
          Kabupaten Barito Kuala, Kalimantan Selatan 70582
        </p>
        <div class="d-flex justify-content-start mt-4">
          <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px"
            href="#"><i class="fab fa-twitter"></i></a>
          <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px"
            href="#"><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px"
            href="#"><i class="fab fa-linkedin-in"></i></a>
          <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px"
            href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-5">
        <h3 class="text-primary mb-4">Get In Touch</h3>
        <div class="d-flex">
          <h4 class="fa fa-envelope text-primary"></h4>
          <div class="pl-3">
            <h5 class="text-white">Email</h5>
            <p>Autoshop@gmail.com</p>
          </div>
        </div>
        <div class="d-flex">
          <h4 class="fa fa-phone-alt text-primary"></h4>
          <div class="pl-3">
            <h5 class="text-white">Phone</h5>
            <p>+012 345 67890</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-5">
        <h3 class="text-primary mb-4">Hubungi Kami</h3>
        <form action="">
          <div class="form-group">
            <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
          </div>
          <div class="form-group">
            <input type="email" class="form-control border-0 py-4" placeholder="Your Email" required="required" />
          </div>
          <div>
            <button class="btn btn-primary btn-block border-0 py-3" type="submit">
              Submit Now
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="assets/lib/easing/easing.min.js"></script>
  <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="assets/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="assets/lib/lightbox/js/lightbox.min.js"></script>

  <!-- Template Javascript -->
  <script src="assets/js/main.js"></script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>