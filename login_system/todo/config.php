<?php
$mysqli=mysqli_connect('localhost','root','','loginDB');
mysqli_select_db($mysqli,'loginDB') or die("database tidak ditemukan");
?> 