<!-- Page Content -->
<div class="page-heading header-text" style="background-image: url(<?= base_url('assets/img/blog/' . $blog['background']); ?>);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1><?= $blog['judul']; ?></h1>
        <span><i class="fa fa-user"></i> <?= $blog['name']; ?> &nbsp;|&nbsp; <i class="fa fa-calendar"></i> <?= $blog['created_at']; ?></span>
      </div>
    </div>
  </div>
</div>

<div class="more-info about-info">
  <div class="container">
    <div class="more-info-content">
      <div class="right-content">
        <div>
          <!-- <img src="assets/images/blog-image-fullscren-1-1920x700.jpg" class="img-fluid" alt=""> -->
        </div>
        <?= $blog['konten']; ?>
      </div>
    </div>
  </div>
</div>

<!-- <div class="callback-form contact-us">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Leave a <em>comment</em></h2>
          <span>Suspendisse a ante in neque iaculis lacinia</span>
        </div>
      </div>
      <div class="col-md-12">
        <div class="contact-form">
          <form id="contact" action="" method="get">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12">
                <fieldset>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                </fieldset>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12">
                <fieldset>
                  <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="filled-button">Submit</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> -->