<div class="d-flex justify-content-center">
<div class="card shadow-lg d-flex justify-content-center" style="width: 22rem; border-radius: 10px; background-color: linear-gradient(135deg, #007BFF, #00D4FF);">
  <img src="img/foto.jpg" class="card-img-top p-3" alt="Logo" style="border-radius: 10px;">
  <div class="card-body text-center">
    <h5 class="card-title text-body">Cetak Laporan harian</h5>
    <form action="cetaklist/cetak_laporan.php" method="POST" class="mt-3">
      <div class="mb-3">
        <input type="date" name="jangka_waktu" class="form-control text-center" required>
      </div>
      <button type="submit" class="btn btn-success btn-lg w-100">
        <i class="fa fa-print"></i> Cetak Laporan
      </button>
    </form>
  </div>
</div>
</div>