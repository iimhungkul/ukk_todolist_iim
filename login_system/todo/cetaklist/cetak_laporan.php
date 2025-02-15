<?php 
include ('../config.php');

//pastikan tanggal dipilih
if (isset($_POST['jangka_waktu'])) {
	$jangka_waktu =  $_POST['jangka_waktu'];

	//query untuk mencari tugas berdasarkan tanggal tertentu
	$query = "SELECT * FROM tbtodo WHERE jangka_waktu = '$jangka_waktu' ORDER BY id ASC";
	$hasil = mysqli_query(mysql: $mysqli, query: $query);

	//header untuk mencetak dalam format HTML
	echo "<!DOCTYPE html>
	<html lang='en'>
	<head>
		<meta charset='utf-8>

    <link rel='shortcut icon' type='x-icon' href='../todolist.png'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<title>Laporan Todolist</title>

		<!-- Bootstrap -->
		<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'>

		<!-- FontAwesome untuk ikon -->
		<link rel'stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'>

		<!-- Google ikon -->
		<link rel'stylesheet' href='https://fonts.googleapis.com.icon?family=Material+Icons'>

		<!-- css tambahan -->
		<link rel'shortcut icon' href='../img/logo.png' type='image/x-icon'>
		<style>
		/* mengatur latar belakang tabel menjadi putih */
		table {
			background-color: white !important;
		}
		@media print {
			button, a {
				display: none !important;
			}
		}
		</style>
	</head>
	<body>
		<div class='container mt-4'>
			<h2 class='text-center mb-4'>Laporan Harian todolist <br>$jangka_waktu</h2>
			<table class='table table-bordered table-striped'>
				<thead class='table-dark text-center'>
					<tr>
						<th>No</th>
						<th>Tugas</th>
						<th>Jangka Waktu</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>";

	$no = 1;
	while ($row = mysqli_fetch_array(result: $hasil)) {
		echo "<tr>
				<td class='text-center'>$no</td>
				<td>{$row['tugas']}</td>
				<td class='text-center'>{$row['jangka_waktu']}</td>
				<td class='text-center'>{$row['keterangan']}</td>
			  </tr>";
		$no++;
	}

	echo "	</tbody>
		</table>
		<div class='text-center mt-3'>
			<button onclick='window.print()' class='btn btn-primary'>
			 <i class='fas fa-print'></i> Cetak
			</button>
			<a href='../index.php?halaman=cetaklist' class='btn btn-secondary'>
			  <i class='fas fa-arrow-left'></i> Kembali
			</a>
		</div>
	</div>
	<script src='https://jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>";
} else {
	echo "<div class='alert alert-danger text-center'>Tanggal tidak dipilih!</div>";
}
?>
