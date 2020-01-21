<?php if (cek_simpanan_wajib() && cek_simpanan_pokok()): ?>


  <div class="content-wrapper">
    <div class="content-anggota" style="margin-top:10px">
      <div class="p-3">
        <p>Untuk dapat mengajukan pinjaman, mendaftarkan anggota dan transaksi lainnya, mohon untuk</p>
        <ul class="mb-1">
          <li>* Membayar <strong><a href="https://localhost/lenteradigital/anggota/simpanan" class="alert-link">SIMPANAN WAJIB</a></strong></li>
          <li>* Membayar <strong><a href="https://localhost/lenteradigital/anggota/simpanan" class="alert-link">SIMPANAN POKOK</a></strong></li>
        </ul>
      </div>
    </div>
  </div>


  <?php else: ?>

<div class="content-wrapper">
  <div class="content-anggota" style="margin-top:0">
    <div class="card">
      <div class="card-body">


      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
<?php endif; ?>
