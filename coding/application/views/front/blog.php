<!-- Page Content -->
<div class="page-heading header-text">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Read our Blog</h1>
        <span>Lorem ipsum dolor sit amet consectetur</span>
      </div>
    </div>
  </div>
</div>

<div class="single-services">
  <div class="container">
    <div class="row">
      <?php foreach ($blog as $row) : ?>
        <div class="col-md-4">
          <section class='tabs-content'>

            <article>
              <img src="assets/images/blog-image-1-940x460.jpg" alt="">
              <h4><a href="blog-details.html"><?= $row['judul']; ?></a></h4>
              <div style="margin-bottom:10px;">
                <span><?= $row['name']; ?> &nbsp;|&nbsp; <?= $row['created_at']; ?></span>
              </div>
              <p><?= substr(strip_tags($row['konten']), 0, 20); ?>...</p>
              <br>
              <div>
                <a href="<?= base_url('blog/' . $row['slug']); ?>" class="filled-button">Continue Reading</a>
              </div>
            </article>

            <br>
            <br>
            <br>

          </section>
        </div>
      <?php endforeach; ?>

      <!-- <div class="col-md-4">
        <h4 class="h4">Search</h4>

        <form id="search_form" name="gs" method="GET" action="#">
          <input type="text" name="q" class="form-control form-control-lg" placeholder="type to search..." autocomplete="on">
        </form>

        <br>
        <br>

        <h4 class="h4">Recent posts</h4>

        <ul>
          <li>
            <h5 style="margin-bottom:10px;"><a href="blog-details.html">Dolorum corporis ullam, reiciendis inventore est repudiandae</a></h5>
            <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10</small>
          </li>

          <li><br></li>

          <li>
            <h5 style="margin-bottom:10px;"><a href="blog-details.html">Culpa ab quasi in rerum dolorum impedit expedita</a></h5>
            <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10</small>
          </li>

          <li><br></li>

          <li>
            <h5 style="margin-bottom:10px;"><a href="blog-details.html">Explicabo soluta corrupti dolor doloribus optio dolorum</a></h5>

            <small><i class="fa fa-user"></i> John Doe &nbsp;|&nbsp; <i class="fa fa-calendar"></i> 27.07.2020 10:10</small>
          </li>
        </ul>
      </div> -->
    </div>
  </div>
</div>

<br>
<br>
<br>
<br>