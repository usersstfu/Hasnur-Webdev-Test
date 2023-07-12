<?php

include "../koneksi.php";


$username=$_POST['username'];
$password=$_POST['password'];

$login="SELECT * FROM user WHERE username='$username'";
$cek=mysqli_query($connection,$login);
$ketemu=mysqli_num_rows($cek);

$login2="SELECT * FROM user WHERE password='$password'";
$cek2=mysqli_query($connection,$login2);
$ketemu2=mysqli_num_rows($cek2);

$login3="SELECT * FROM user WHERE username='$username' AND password='$password'";
$cek3=mysqli_query($connection,$login3);
$ketemu3=mysqli_num_rows($cek3);

$r=mysqli_fetch_array($cek3);
$hasil=$r ['username'];



if ($ketemu ==0 & $ketemu2==0){
    echo "<script> alert ('Username dan Password Anda Salah. Coba Lagi');
    window.location = 'login.php'</script>";
}

else if ($ketemu ==0){
    echo "<script> alert ('Username Anda Salah! Coba Lagi.');
    window.location = 'login.php'</script>";
}

else if ($ketemu2 ==0){
    echo "<script> alert ('Password Anda Salah! Coba Lagi.');
    window.location = 'login.php'</script>";
}


else {
    session_start();
    echo "<script> alert ('Login Berhasil');
    window.location = 'indexadmin.php'</script>";


}