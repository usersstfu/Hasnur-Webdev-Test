<?php 
require('fungsi.php');

$id = $_GET["id_materi"];
if (hapus_materi($id) > 0) {
	echo "
				<script>
					alert('Data berhasil dihapus!');
					document.location.href = 'data-materi.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('Data gagal dihapus!');
					document.location.href = 'data-materi.php';
				</script>
		";
}
?>