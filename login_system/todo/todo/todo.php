<?php
include "config.php";if (isset($_POST['cari'])) {
  $cari=$_POST['cari'];
  $sql=" SELECT * FROM tbtodo WHERE tugas LIKE '%$cari%'";
}else{
  $sql="SELECT * FROM tbtodo LIMIT 0,5;";
}

if (isset($_GET['star'])) {
  $star= $_GET['star'];
  $sql="SELECT * FROM tbtodo LIMIT $star,5;";
}

$hasil= mysqli_query($mysqli,$sql);
$sql2= "SELECT * FROM tbtodo";
$hasil2= mysqli_query($mysqli,$sql2);
$jlhdata=mysqli_num_rows($hasil2);
$perulangan=$jlhdata/5;
?>
<?php 
  if (isset($_GET['pesan_tambah'])) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil ditambah!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
  }

  if (isset($_GET['pesan_edit'])) {
    ?>
    <div class="alert alert-<?php echo $_GET['pesan_edit']=='berhasil'?'success':'danger' ;?> alert-dismissible fade show" role="alert">
    <strong><?php echo $_GET['pesan_edit']=='berhasil'?'Berhasil':'Gagal' ;?> diedit!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
  }

  if (isset($_GET['pesan_hapus'])) {
    ?>
    <div class="alert alert-<?php echo $_GET['pesan_hapus']=='berhasil'?'danger':'danger' ;?> alert-dismissible fade show" role="alert">
    <strong><?php echo $_GET['pesan_hapus']=='berhasil'?'Berhasil':'Gagal' ;?> dihapus!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
  }
 ?>
 
<h2 class="text-body">Tabel Todo List</h2>

<!-- Button trigger modal -->
<button style="float: right;" type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal" title="tambah">
   <i class="fa fa-plus"></i> Tambah Tugas
</button>
<br>
<br>
<form action="index.php?halaman=todo" method="POST">
<div class="row d-flex justify-content-end mb-2">
  <div class="col-2">
    <input type="text" name="cari" placeholder="Cari" class="col-12 form-control" title="isi">
  </div>
  <div class="col-1">
    <button type="submit" class="10 form-control" title="cari">
      Cari
    </button>
  </div>
</div>
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-body" id="exampleModalLabel">Tambah Tugas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="todo/aksi_tambah_todo.php">
      <div class="modal-body">
        <div class="mb-3">
	  <label class="form-label text-body">Tugas</label>
	  <input type="text" class="form-control" placeholder="Tugas" name="tugas" required>
	</div>
	<div class="mb-3">
	  <label class="form-label text-body">Jangka Waktu</label>
	  <input type="date" class="form-control" name="jangka_waktu">
	</div>
	<div class="mb-3">
	  <label class="form-label text-body">Keterangan</label>
	  <select class="form-control" name="keterangan">
	  	<option>Belum Selesai</option>
	  	<option>Selesai</option>
	  </select>
	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" title="keluar">Keluar</button>
        <button type="submit" class="btn btn-primary" title="simpan">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<table border="1" class="table table-bordered text-body table-striped">

  <thead class="table-dark text-center">
 <tr>
 <td>No</td><td>Tugas</td><td>Jangka Waktu</td><td>Keterangan</td><td>Aksi</td>
 </tr>
 </thead>
<?php
$no=1;
  if (mysqli_num_rows(result: $hasil) > 0) {
    while ($row = mysqli_fetch_array(result: $hasil)) {
      echo "<tr>
      <td class='text-center'>$no</td>
      <td>$row[tugas]</td>
      <td class='text-center'>$row[jangka_waktu]</td>
      <td>
        <input type='checkbox' onclick='updateStatus($row[id], this)'" . ($row['keterangan'] == 'Selesai' ? 'checked' : '') . ">
        <span id='status-$row[id]'>$row[keterangan]</span>
        </td>
        <td>
            <a class='btn btn-warning fa fa-pencil' href='index.php?halaman=edit_todo&id=$row[id]'> Edit </a>
            <a class='btn btn-danger fa fa-trash' href='todo/aksi_hapus_todo.php?id={$row['id']}'
            onclick=\"return confirm('Yakin ingin menghapus?')\"> Hapus <a>

        </td>
      </tr>";
      $no++;
    }
  } else {
    echo "<tr><td colspan='5' class='text-center'>Tidak ada data ditemukan.</td></tr>";
  }
?>
</table>

<div class="d-flex justify-content-end">
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <?php 
    $page=0;
      for ($i=0; $i < $perulangan; $i++) { 
        ?>
         <li class="page-item"><a class="page-link" href="index.php?halaman=todo&star=<?= $page ?>"><?=$i+1?></a></li>
        <?php 
        $page+=5;
      }
     ?>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</div>