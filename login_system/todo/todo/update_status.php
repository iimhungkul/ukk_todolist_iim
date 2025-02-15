<?php 
include ('../config.php');

if (isset($_POST['id']) && isset($_POST['keterangan'])) {
	$id = intval(value: $_POST['id']); // pastikan ID aman dari sql Injection 
	$keterangan = $_POST['keterangan'] === "Selesai" ? "Selesai" : "Belum Selesai";

	$query = "UPDATE tbtodo SET keterangan = '$keterangan' WHERE id = $id";
	if (mysqli_query(mysql: $mysqli, query: $query)) {
		echo "success"; //kirim respons sukses
	} else {
		echo "error"; // jika gagal, kirim "error"
	}
}
?>
