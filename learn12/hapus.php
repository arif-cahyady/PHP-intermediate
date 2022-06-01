<?php  

require 'functions.php';

$id = $_GET["id"];

if ( delete($id) > 0 ) {
	echo "
			<script>
				alert('Data Berhasil Di Hapus !');
				document.location.href = 'index.php';
			</script>
		";
} else {
	echo "
			<script>
				alert('Data Gagal Di Hapus !');
				document.location.href = 'index.php';
			</script>
		";
}


?>