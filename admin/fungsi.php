<?php
require('koneksi.php');
?>

<?php
$conn = mysqli_connect("localhost", "root", "", "basdat");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    if (!$result || mysqli_num_rows($result) === 0) {
        return []; // Kembalikan array kosong jika query tidak berhasil atau tidak ada hasil
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


//fungsi untuk menambah data pada tabel admin 
function tambah_admin($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk tambah data
    $iduser = htmlspecialchars($data["iduser"]);
    $namauser = htmlspecialchars($data["namauser"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    //query untuk menambah data
    $query = "INSERT INTO user values('$iduser','$namauser','$username','$password')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk mengubah data pada tabel pelanggan
function ubah_admin($data)
{ 
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk ubah data
    $iduser = htmlspecialchars($data["iduser"]);
    $namauser = htmlspecialchars($data["namauser"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    //query untuk mengubah / update data
    $query = "UPDATE user SET iduser='$iduser', namauser='$namauser', username='$username', password='$password'
     WHERE $iduser = iduser";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//fungsi untuk menghapus data pada tabel pelanggan
function hapus_admin($id)
{
    //memanggil variabel global conn
    global $conn;
    //query untuk menghapus data
    mysqli_query($conn, "DELETE FROM user WHERE iduser ='$id'");
    return mysqli_affected_rows($conn);
}

function tambah_kursus($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk tambah data
    $id_kursus = htmlspecialchars($data["id_kursus"]);
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $judul = htmlspecialchars($data["judul"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $durasi = htmlspecialchars($data["durasi"]);
    //query untuk menambah data
    $query = "INSERT INTO kursus values('$id_kursus','$id_kategori','$judul','$deskripsi','$durasi')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubah_kursus($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk ubah data
    $id_kursus = htmlspecialchars($data["id_kursus"]);
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $judul = htmlspecialchars($data["judul"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $durasi = htmlspecialchars($data["durasi"]);
    //query untuk mengubah / update data
    $query = "UPDATE kursus SET id_kursus='$id_kursus', id_kategori='$id_kategori', judul='$judul',deskripsi='$deskripsi',durasi='$durasi' 
    where $id_kursus = id_kursus"
    ;
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_kursus($id)
{
    //memanggil variabel global conn
    global $conn;
    //query untuk menghapus data
    mysqli_query($conn, "DELETE FROM kursus WHERE id_kursus ='$id'");
    return mysqli_affected_rows($conn);
}

function tambah_kategori($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk tambah data
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $jenis_kategori = htmlspecialchars($data["jenis_kategori"]);
    //query untuk menambah data
    $query = "INSERT INTO kategori values('$id_kategori','$jenis_kategori')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_kategori($id)
{
    //memanggil variabel global conn
    global $conn;
    //query untuk menghapus data
    mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori ='$id'");
    return mysqli_affected_rows($conn);
}

function ubah_kategori($data)
{
    //memanggil variabel global conn
    global $conn;
    //mendeklariskan variabel untuk ubah data
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $jenis_kategori = htmlspecialchars($data["jenis_kategori"]);
    //query untuk mengubah / update data
    $query = "UPDATE kategori SET id_kategori='$id_kategori', jenis_kategori='$jenis_kategori'
    where $id_kategori = id_kategori"
    ;
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus_materi($id)
{
    //memanggil variabel global conn
    global $conn;
    //query untuk menghapus data
    mysqli_query($conn, "DELETE FROM materi WHERE id_materi ='$id'");
    return mysqli_affected_rows($conn);
}