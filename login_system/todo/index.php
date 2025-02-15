<!doctype html>
<html lang="en">
  <style type="text/css">
  	.teks-putih{
  		color: white !important;
  	}
  </style>
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="x-icon" href="../todolist.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

    <script>
      function updateStatus(id, checkbox) {
        var status = checkbox.checked ? "Selesai" : "Belum Selesai";

        $.ajax({
          url: 'todo/update_status.php',
          type: 'POST',
          data: { id: id, keterangan: status },
          success: function(response) {
            if (response.trim() === "success") {
              document.getElementById('status-' + id).innerText = status;
            } else {
              alert('Gagal memperbarui status!');
              checkbox.checked = !checkbox.checked; //kembalikan checkbox jadi gagal
            }
          },
          error: function() {
            alert('Terjadi kesalahan, coba lagi!');
            checkbox.checked = !checkbox.checked;
          }
        });
      }
    </script>
  </head>
  <body>
    <!-- NavBar -->

    <nav class="navbar navbar-expand-lg teks-putih" style="background:rgba(0, 0, 0, 0.92);">

    <?php
        session_start();
        $username = $_SESSION['username'];
        $level = $_SESSION['level'];
        if(!empty($username) && ($level == '1')){
            echo "Selamat datang! ".$username;
        }else{
            header('location:../index.html');
        }

    ?>
	  <div class="container-fluid">
	    <a class="navbar-brand teks-putih" href="#">Todo List</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active teks-putih" aria-current="page" href="index.php?halaman=home" title="home">Home</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link teks-putih" href="index.php?halaman=todo" title="todo">Todo</a>
	        </li>
          <li class="nav-item">
            <a class="nav-link teks-putih" href="index.php?halaman=cetaklist" onclick="setActive(this)" title="cetaklist">Cetak List</a>
          </li>
	        
	      </ul>
	      <form class="d-flex" role="search">
	        <a href="../logout1.php" class="btn btn-outline-danger m-1" title="keluar">Keluar</a>
	      </form>
	    </div>
	  </div>
	</nav>

    <!-- NavBar -->


    <!-- Content-->

    	<div class="container-fliud teks-putih">
    		<div class="row d-flex justify-content-center mt-3" style="min-height: 400px;" >
    			<div class="col-md-10 p-4 rounded-2" >
    				<?php
    					if ($_GET['halaman']=='home') {
    						include "home/home.php";
    					}
    					else if ($_GET['halaman']=='todo') {
    						include "todo/todo.php";
    					}
    					else if ($_GET['halaman']=='edit_todo') {
    						include "todo/edit_todo.php";
    					}
              else if ($_GET['halaman']=='cetaklist') {
                include "cetaklist/cetaklist.php";
              }
    				?>
    				
    
    			</div>
    		</div>
    		
    	</div>

    <!-- Content-->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    	$(".alert").delay(1000).slideUp(200, function() {
    	$(this).alert('close');
    	});
    </script>
    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
  <p>&copy; Aplikasi TodoList</p>
</footer>
  </body>
</html>
