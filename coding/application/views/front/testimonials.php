

    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Testimonials</h1>
            <span>testimonials from our greatest clients</span>
          </div>
        </div>
      </div>
    </div>

    <div class="testimonials" style="margin: 0">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-testimonials owl-carousel">
              
              <?php foreach($testimoni as $row) { ?>
                <div class="testimonial-item">
                  <div class="inner-content">
                    <h4><?= $row['nama']; ?></h4>
                    <p><?= $row['pesan']; ?></p>
                  </div>
                  <img src="<?= base_url('assets/img/testimoni/' . $row['foto']); ?>" alt="">
                </div>
              <?php } ?>
              
              
            </div>
          </div>
        </div>
      </div>
    </div>

 