<?php 
require('fungsi.php');

$id = $_GET["iduser"];
if (hapus_admin($id) > 0) {
	echo "
				<script>
					alert('Data berhasil dihapus!');
					document.location.href = 'data-user.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('Data gagal dihapus!');
					document.location.href = 'data-user.php';
				</script>
		";
}
?>