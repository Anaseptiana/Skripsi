<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text" id="top">
  <div class="Modern-Slider">
    <?php foreach ($banner as $row) { ?>
      <?php $i = 1; ?>
      <!-- Item -->
      <div class="item item-<?= $i; ?>" style="background-image: url(assets/img/banner/<?= $row['gambar'] ?>); background-size: cover;">
        <div class="img-fill">
          <div class="text-content">
            <h4><?= $row['judul']; ?></h4>
            <p><?= $row['sub_judul']; ?> </p>
            <a href="<?= $row['link'] ?>" class="filled-button"><?= $row['nama_link']; ?></a>
          </div>
        </div>
      </div>
      <!-- // Item -->
      <?php $i = $i + 1; ?>
    <?php } ?>
  </div>
</div>
<!-- Banner Ends Here -->

<div class="request-form">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h4>Request a call back right now ?</h4>
        <span>Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</span>
      </div>
      <div class="col-md-4">
        <a href="<?= base_url('contact'); ?>" class="border-button">Contact Us</a>
      </div>
    </div>
  </div>
</div>

<div class="services">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Featured <em>Cars</em></h2>
          <span>Aliquam id urna imperdiet libero mollis hendrerit</span>
        </div>
      </div>
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
  </div>
</div>

<div class="fun-facts">
  <div class="container">
    <div class="more-info-content">
      <div class="row">
        <div class="col-md-6">
          <div class="left-image">
            <img src="<?= base_url('assets/img/'); ?>logo/logo-rental.jpeg" class="img-fluid" alt="">
          </div>
        </div>
        <div class="col-md-6 align-self-center">
          <div class="right-content">
            <span>Who we are</span>
            <h2>Get to know about <em>our company</em></h2>
            <p>Hamidah Rent Car berawal dari perusahaan yang bergerak di biro jasa pemberangkatan haji dan umrah yang memiliki legalitas tertanggal 24 Februari 2018 yang bernama PT. Ratu Hamidah Sampurna Bersaudara (Hamidah Private Tour & Travel).</p>
            <a href="<?= base_url('about'); ?>" class="filled-button">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <div class="more-info">
  <div class="container">
    <div class="section-heading">
      <h2>Read our <em>Blog</em></h2>
      <span>Aliquam id urna imperdiet libero mollis hendrerit</span>
    </div>

    <div class="row" id="tabs">
      <div class="col-md-4">
        <ul>
          <?php $no = 1;
          foreach ($blogs as $blog) : ?>
            <li><a href='#tabs-<?= $no; ?>'> <?= $blog['judul']; ?> <br> <small><?= $blog['name']; ?>&nbsp;|&nbsp;<?= $blog['created_at']; ?></small></a></li>
          <?php $no++;
          endforeach; ?>
        </ul>

        <br>

        <div class="text-center">
          <a href="<?= base_url('blog'); ?>" class="filled-button">Read More</a>
        </div>

        <br>
      </div>

      <div class="col-md-8">
        <section class='tabs-content'>
          <?php $no = 1;
          foreach ($blogs as $blogg) : ?>
            <article id='tabs-<?= $no; ?>'>
              <img src="<?= base_url('assets/img/blog/' . $blogg['background']); ?>" alt="" width="700px" height="500px">
              <h4><a href="blog-details.html"><?= $blogg['judul']; ?></a></h4>
              <p><?= substr(strip_tags($blogg['konten']), 0, 100); ?>...</p>
            </article>
          <?php $no++;
          endforeach; ?>
        </section>
      </div>
    </div>
  </div>
</div> -->

<div class="testimonials">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>What they say <em>about us</em></h2>
          <span>testimonials from our greatest clients</span>
        </div>
      </div>
      <div class="col-md-12">
        <div class="owl-testimonials owl-carousel">

          <?php foreach ($testimoni as $row) { ?>
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

<!-- <div class="callback-form">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Request a <em>call back</em></h2>
          <span>Etiam suscipit ante a odio consequat</span>
        </div>
      </div>
      <div class="col-md-12">
        <div class="contact-form">
          <form id="contact" action="<?= base_url('kirim_pesan'); ?>" method="post">
            <div class="row">
              <div class="col-lg-4 col-md-12 col-sm-12">
                <fieldset>
                  <input name="nama" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                </fieldset>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12">
                <fieldset>
                  <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                </fieldset>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12">
                <fieldset>
                  <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="isi_pesan" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="border-button">Send Message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <br>
    <br>
    <br>
    <br>
  </div>
</div> -->