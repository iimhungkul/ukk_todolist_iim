<?php 
session_start();
session_destroy();
echo "<script>
    alert('Logout berhasil');
    location.href='logout.php';

	</script>"; 
?>