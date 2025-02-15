<?php
include("config.php");
$hasil=mysqli_query($mysqli,"select * from tbtodo where id='$_GET[id]'");
$row=mysqli_fetch_array($hasil);
?>

<div class="d-flex justify-content-center">
<div class="card text-body col-md-6">
  <div class="card-header">
    Edit Tugas
  </div>
  <form method="POST" action="todo/aksi_edit_todo.php">
  <div class="card-body text-body">
    <div class="mb-3">
    <label class="form-label text-body">Tugas</label>
    <input type="text" class="form-control" placeholder="Tugas" name="tugas" value="<?= $row['tugas']?>">
    <input type="hidden" name="id" value="<?= $row['id']?>">
  </div>
  <div class="mb-3">
    <label class="form-label text-body">Jangka Waktu</label>
    <input type="date" class="form-control" name="jangka_waktu" value="<?= $row['jangka_waktu']?>">
  </div>
  <div class="mb-3">
    <label class="form-label text-body">Keterangan</label>
    <select class="form-control" name="keterangan">
      <option>Pilih</option>
      <option selected <?php echo $row['keterangan']=='Belum Selesai'? 'selected': '' ?>>Belum Selesai</option>
      <option <?php echo $row['keterangan']=='Selesai'? 'selected': '' ?>>Selesai</option>
    </select>
  </div>
  </div>
  <div class="card-footer text-body-secondary">
    <a href="index.php?halaman=todo">
    <button type="button" class="btn btn-secondary" title="kembali"><i class="fa fa-arrow-left"></i> Kembali</button>
    </a>
        <button type="submit" class="btn btn-primary" title="simpan">Simpan</button>
  </div>
  <form>
</div>
</div>