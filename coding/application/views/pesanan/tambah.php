<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-8">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-body">
                    <form class="user" method="post" action="">
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
                                <input type="date" class="form-control" name="tanggal_mulai" placeholder="Tanggal Pesan" required="">
                              </fieldset>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <fieldset>
                                <label>Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tanggal_selesai" placeholder="Tanggal Selesai" required="">
                              </fieldset>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6 mt-4">
                            <div class="form-group">
                              <fieldset>
                                <input class="input-supir" type="radio" name="supir" value="1" data-harga-mobil="<?= $mobil['harga_dalam_kota']; ?>" data-text-harga="Rp. <?= numberFormat($mobil['harga_dalam_kota']); ?>"> Dalam Kota
                                <input class="input-supir ml-3" type="radio" name="supir" value="2" class="ml-3" data-harga-mobil="<?= $mobil['harga_luar_kota']; ?>" data-text-harga="Rp. <?= numberFormat($mobil['harga_luar_kota']); ?>"> Luar Kota
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
                        <button type="submit" class="btn btn-primary btn-sm">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<br>
<!-- End of Main Content -->