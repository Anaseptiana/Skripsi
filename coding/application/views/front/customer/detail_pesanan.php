    <style type="text/css">
        @media print {
          .noPrint{
            display:none;
          }
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="card mt-5">

                    <?= $this->session->flashdata('message'); ?>
                    
                    <div class="card-header">
                        <span>Detal Pesanan</span>
                        <button onclick="window.print();" class="btn btn-info btn-sm float-right noPrint">Cetak</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th>No. Pesanan</th>
                                <td><?= $detail_pesanan['no_pesanan']; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Pesan</th>
                                <td><?= $detail_pesanan['tanggal_pesan']; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Mulai Sewa</th>
                                <td><?= $detail_pesanan['tanggal_mulai']; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Akhir Sewa</th>
                                <td><?= $detail_pesanan['tanggal_selesai']; ?></td>
                            </tr>
                                <th>Nama Customer</th>
                                <td><?= $customer['nama_customer']; ?></td>
                            </tr>
                            <tr>
                                <th>Mobil</th>
                                <td><?= $detail_pesanan['nama_mobil']; ?></td>
                            </tr>
                            <tr>
                                <th>Supir</th>
                                <td><?= ($detail_pesanan['supir'] == null) ? "-" : 'Ya'; ?></td>
                            </tr>
                            <tr>
                                <th>Nama Supir</th>
                                <td><?= $detail_pesanan['nama_supir']; ?></td>
                            </tr>
                            <tr>
                                <th>Harga Sewa Mobil</th>
                                <td>Rp. <?= numberFormat($detail_pesanan['harga_mobil']); ?></td>
                            </tr>
                            <tr>
                                <th>Harga Sewa Supir</th>
                                <td>Rp. <?= numberFormat($detail_pesanan['harga_supir']); ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah Hari</th>
                                <td><?= $detail_pesanan['jumlah_hari']; ?></td>
                            </tr>
                            <tr>
                                <th>Total Harga Sewa Mobil</th>
                                <td>Rp. <?= numberFormat($detail_pesanan['harga_mobil'] * $detail_pesanan['jumlah_hari']); ?></td>
                            </tr>
                            <tr>
                                <th>Total Harga Sewa Supir</th>
                                <td>Rp. <?= numberFormat($detail_pesanan['harga_supir'] * $detail_pesanan['jumlah_hari']); ?></td>
                            </tr>
                            <tr>
                                <th>Total Harga</th>
                                <td>Rp. <?= numberFormat($detail_pesanan['total_harga']); ?></td>
                            </tr>

                            <?php if(!is_null($detail_pesanan['lokasi_jemput']) || $detail_pesanan['lokasi_jemput'] != '') : ?>
                                <tr>
                                    <th>Lokasi Jemput</th>
                                    <td><?= $detail_pesanan['lokasi_jemput']; ?></td>
                                </tr>
                            <?php endif; ?>
                           <!--  <tr>
                                <th>Status</th>
                                <td><?= statusPesanan($detail_pesanan['status']); ?></td>
                            </tr> -->
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card mt-5">
                    <div class="card-header">Status</div>
                    <div class="card-body">
                        <?= statusPesanan($detail_pesanan['status']); ?>
                    </div>
                </div>
                <?php if($detail_pesanan['status'] == 1) : ?>
                    <div class="card mt-3 noPrint">
                        <div class="card-header">No. Rekening <?= $setting['nama_website']; ?> </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No. Rekening</th>
                                    <td>1212121212</td>
                                </tr>
                                <tr>
                                    <th>Bank</th>
                                    <td>BCA</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-3 noPrint">
                        <div class="card-header">
                            Konfirmasi Pesanan
                        </div>
                        <form action="<?= base_url('customer/post_konfirmasi_pesanan'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                    <input type="hidden" name="id_pesanan" value="<?= $detail_pesanan['id_pesanan']; ?>">
                                    <div class="form-group">
                                        <label>Nama Akun</label>
                                        <input type="text" name="nama_akun" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>No. Rekening</label>
                                        <input type="text" name="no_rekening" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Transfer</label>
                                        <input type="date" name="tanggal_transfer" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Bukti Transfer</label>
                                        <input type="file" name="bukti_transfer" class="form-control">
                                    </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Konfirmasi</button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if(($detail_pesanan['status'] == 5) && $testimoni == null) : ?>
        <div class="row mt-3 noPrint">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('customer/post_testimoni'); ?>" method="POST">
                            <input type="hidden" name="id_pesanan" value="<?= $detail_pesanan['id_pesanan']; ?>">
                            <div class="form-group">
                                <label>Kirim Testimoni</label>
                                <textarea class="form-control" name="pesan" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-submit">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php elseif($testimoni != null) : ?>
            <div class="row mt-3 noPrint">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Testimoni Anda</div>
                        <div class="card-body">
                            <p><?= $testimoni['pesan'] ;?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>