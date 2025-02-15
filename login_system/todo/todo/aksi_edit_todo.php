<?php 
include "../config.php";
$id=$_POST['id'];
$tugas=$_POST['tugas'];
$jangka_waktu=$_POST['jangka_waktu'];
$keterangan=$_POST['keterangan'];
$sql ="update tbtodo set
  tugas='$tugas',
  jangka_waktu='$jangka_waktu',
  keterangan='$keterangan'
  where id='$id'";
  //echo $sql;
mysqli_query($mysqli,$sql);
$r=mysqli_affected_rows($mysqli);
if ($r > 0) {
  header("location:http:/login_system/todo/index.php?halaman=todo&pesan_edit=berhasil");
}else{
  header("location:http:/login_system/todo/index.php?halaman=todo&pesan_edit=gagal");
}
 ?>