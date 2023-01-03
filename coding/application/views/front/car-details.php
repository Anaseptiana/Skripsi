<!-- Page Content -->
<div class="page-heading header-text" style="background-image: url(<?= base_url('assets/img/mobil/background/' . $mobil['background']); ?>);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
   <!--      <h2><small>Harga Dalam Kota</small> Rp <?= number_format($mobil['harga_dalam_kota']); ?></h2>
        <h2><small>Harga Luar Kota</small> Rp <?= number_format($mobil['harga_luar_kota']); ?></h2> -->
        <h1><?= $mobil['nama_mobil']; ?></h1>
        <!-- <span>
          <?= $mobil['nama_mobil']; ?>
        </span> -->
      </div>
    </div>
  </div>
</div>

<div class="services">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div>
          <?php if ($gambar_default) : ?>
            <img src="<?= base_url('assets/'); ?>img/mobil/gambar/<?= $gambar_default['gambar']; ?>" alt="<?= $mobil['nama_mobil']; ?>" class="img-fluid wc-image product-big-img">
          <?php endif; ?>
        </div>

        <br>

        <div class="row product-thumbs-track">
          <div class="col-sm-4 col-6">
            <?php if ($gambar_default) : ?>
              <div class="pt" data-imgbigurl="<?= base_url('assets/'); ?>img/mobil/gambar/<?= $gambar_default['gambar']; ?>">
                <img src="<?= base_url('assets/'); ?>img/mobil/gambar/<?= $gambar_default['gambar']; ?>" alt="<?= $mobil['nama_mobil']; ?>" class="img-fluid">
              </div>
            <?php endif; ?>
            <br>
          </div>
          <?php foreach ($gambar_mobil as $gmbr) : ?>
            <div class="col-sm-4 col-6">
              <div class="pt" data-imgbigurl="<?= base_url('assets/'); ?>img/mobil/gambar/<?= $gmbr['gambar']; ?>">
                <img src="<?= base_url('assets/'); ?>img/mobil/gambar/<?= $gmbr['gambar']; ?>" alt="" class="img-fluid">
              </div>
              <br>
            </div>
          <?php endforeach; ?>
        </div>

        <br>
      </div>

      <div class="col-md-5">
        <a href="" class="btn btn-success btn-block"><i class="fa fa-whatsapp" aria-hidden="true"></i> Tanyakan lewat WhatsApp</a>
        <a href="#" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope" aria-hidden="true"></i> Pesan</a>
        
        <div class="tabs-content">
          <h4>Harga</h4>
            <p>- Harga Dalam Kota : Rp. <?= numberFormat($mobil['harga_dalam_kota']); ?></p>
            <p>- Harga Luar Kota : Rp. <?= numberFormat($mobil['harga_luar_kota']); ?></p>
          <br>
        </div>

        <div class="tabs-content">
          <h4>Deskripsi Kendaraan</h4>
          <?= $mobil['deskripsi_mobil']; ?>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 70px;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Pemesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php if($this->session->userdata('customer')) : ?>
        <div class="modal-body">
          <form action="<?= base_url('customer/post_pesanan'); ?>" method="POST" id="contact">
            <div class="form-group">
              <input type="hidden" name="id_customer" value="<?= $customer['id_customer']; ?>">
              <fieldset>
                <label>Nama Customer</label>
                <input type="text" class="form-control" placeholder="Enter full name" readonly value="<?= $customer['nama_customer']; ?>">
              </fieldset>
            </div>

            <div class="form-group">
              <fieldset>
                <label>Alamat</label>
                <input type="text" class="form-control" placeholder="Enter Address" readonly value="<?= $customer['alamat']; ?>">
              </fieldset>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <fieldset>
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Enter email address" readonly value="<?= $customer['email']; ?>">
                  </fieldset>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <fieldset>
                    <label>Phone</label>
                    <input type="text" class="form-control" placeholder="Enter phone" readonly value="<?= $customer['telp']; ?>">
                  </fieldset>
                </div>
              </div>
            </div>

            <hr>

            <div class="form-group">
              <fieldset>
                <label>Nama Mobil</label>
                <input type="hidden" name="id_mobil" value="<?= $mobil['id_mobil']; ?>">
                <input type="text" class="form-control" name="nama_mobil" placeholder="Nama Mobil" readonly value="<?= $mobil['nama_mobil']; ?>">
              </fieldset>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <fieldset>
                    <label>Tanggal Mulai</label>
                    <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Tanggal Pesan" required="">
                  </fieldset>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <fieldset>
                    <label>Tanggal Selesai</label>
                    <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai" required="">
                  </fieldset>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mt-4">
                <div class="form-group">
                  <fieldset>
                    <input class="input-supir" type="radio" name="radio1" value="1" data-harga-mobil="<?= $mobil['harga_dalam_kota']; ?>" data-text-harga="Rp. <?= numberFormat($mobil['harga_dalam_kota']); ?>"> Dalam Kota
                    <input class="input-supir ml-3" type="radio" name="radio1" value="2" class="ml-3" data-harga-mobil="<?= $mobil['harga_luar_kota']; ?>" data-text-harga="Rp. <?= numberFormat($mobil['harga_luar_kota']); ?>"> Luar Kota
                  </fieldset>
                </div>
              </div>
            </div>

            <div class="form-group">
              <fieldset>
                <label>Tujuan</label>
                <input type="hidden" name="tujuan" id="tujuan">
                <input type="text" class="form-control" id="tujuan" placeholder="Tujuan">
              </fieldset>
            </div>

            <div class="form-group">
              <fieldset>
                <label>Harga Sewa Mobil</label>
                <input type="hidden" name="harga_mobil" id="harga_mobil">
                <input type="text" class="form-control" id="harga_sewa_mobil" placeholder="Harga Sewa Mobil" readonly>
              </fieldset>
            </div>

            <div class="row">
              <div class="col-md-6 mt-4">
                <div class="form-group">
                  <fieldset>
                    <input id="check-supir" type="checkbox" name="supir" value="1" data-harga-luar-kota="<?= $setting['harga_supir_luar_kota']; ?>" data-harga-dalam-kota="<?= $setting['harga_supir_dalam_kota']; ?>"> Dengan Supir
                  </fieldset>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <fieldset>
                    <label>Harga Supir</label>
                    <input type="text" class="form-control" name="harga_supir" id="harga_supir" placeholder="Harga Supir" readonly>
                  </fieldset>
                </div>
              </div>
            </div>

            <div class="row" id="lokasiJemput" style="display: none;">
              <div class="col-lg-12">
                <div class="form-group">
                  <fieldset>
                    <label>Lokasi Jemput</label>
                    <textarea class="form-control" name="lokasi_jemput" id="lokasi_jemput"></textarea>
                  </fieldset>
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <fieldset>
                    <label>Jumlah Hari</label>
                    <input type="text" class="form-control" name="jumlah_hari" id="jumlah_hari" readonly>
                  </fieldset>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <fieldset>
                    <label>Total Harga Sewa Mobil</label>
                    <input type="text" class="form-control" name="total_harga_sewa_mobil" id="total_harga_sewa_mobil" readonly>
                  </fieldset>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <fieldset>
                    <label>Total Harga Sewa Supir</label>
                    <input type="text" class="form-control" name="total_harga_sewa_supir" id="total_harga_sewa_supir" readonly>
                  </fieldset>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <fieldset>
                    <label>Total</label>
                    <input type="text" class="form-control" name="total" id="total" readonly>
                  </fieldset>
                </div>
              </div>
            </div>

        </div>
      <?php else : ?>
        <div class="modal-body">
          <h3>Silahkan login terlebih dahulu</h3>
        </div>
      <?php endif; ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <?php if($this->session->userdata('customer')) : ?>
          <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
        <?php else:  ?>
          <a href="<?= base_url('login'); ?>?redirect=<?= current_url(); ?>" class="btn btn-primary">Login</a>
        <?php endif; ?>
        </form>
      </div>
    </div>
  </div>
</div>