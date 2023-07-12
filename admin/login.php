<?php

require('../koneksi.php');

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $check = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username' and password = '$password'");
    if (mysqli_num_rows($check) === 1) {
        echo "
        <script>
        alert('Login Berhasil');
        document.location.href = 'indexadmin.php';
        </script> ";
    } else {
        echo "
        <script>
        alert('Username/Password Salah');
        document.location.href = 'login.php';
        </script> ";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Login 08</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  .btn-secondary {
    background-color: #ffc700 !important;
    border: 2px solid black !important;

  }
  </style>
  <link rel="stylesheet" href="../assets/css/login.css">

</head>

<body style="background: #498ac6">
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-lg-5">
          <div class="login-wrap p-4 p-lg-5">
            <div class="icon d-flex align-items-center justify-content-center"
              style="background-color:#ffc700; border:2px solid black">
              <span class="fa fa-user-o"></span>
            </div>
            <h3 class="text-center mb-4" style="color:orangered;">Admin</h3>
            <form action="login-proses.php" class="login-form" method="post">
              <div class="form-group">
                <input type="text" class="form-control rounded-left" name="username" placeholder="username" required>
              </div>
              <div class="form-group d-flex">
                <input type="password" class="form-control rounded-left" name="password" placeholder="password"
                  required>
              </div>
              <br>
              <div class="form-group">
                <button type="submit" name="login" class="btn btn-secondary rounded submit p-3 px-5">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/popper.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>