

    <!-- Page Content -->
    <div class="page-heading header-text" style="background-image: url(assets/images/mobil/background-car.jpg); background-size: cover;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Cars</h1>
            <span>Lorem ipsum dolor sit amet.</span>
          </div>
        </div>
      </div>
    </div>

    <div class="services">
      <div class="container">
        <div class="row">
          <?php foreach ($mobils as $mobil) : 
            $cek_mobil = $this->db->where('id_mobil', $mobil['id_mobil'])
                                  ->where('status', 3)
                                  ->get('pesanan')
                                  ->num_rows();
          ?>
            <div class="col-md-4">
              <div class="service-item">
                <img src="<?= base_url('assets/img/mobil/background/' . $mobil['background']); ?>" alt="">
                <div class="down-content">
                  <h4><?= $mobil['nama_mobil']; ?></h4>
                  <div style="margin-bottom:10px;">
                    <ul>
                      <li>Harga Dalam Kota Rp. <?= number_format($mobil['harga_dalam_kota']); ?></li>
                      <li>Harga Luar Kota Rp. <?= number_format($mobil['harga_luar_kota']); ?></li>
                    </ul>
                  </div>
                  <?php if($cek_mobil > 0) : ?>
                    <button class="filled-button" disabled>Tidak Tersedia</button>
                  <?php else : ?>
                    <a href="<?= base_url('mobil/' . $mobil['slug']); ?>" class="filled-button">View More</a>
                  <?php endif; ?>
                </div>
              </div>

              <br>
            </div>
          <?php endforeach; ?>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
    </div>

