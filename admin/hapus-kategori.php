<?php 
require('fungsi.php');

$id = $_GET["idpembeli"];
if (hapus_kategori($id) > 0) {
	echo "
				<script>
					alert('Data berhasil dihapus!');
					document.location.href = 'data-kategori.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('Data gagal dihapus!');
					document.location.href = 'data-kategori.php';
				</script>
		";
}
?>