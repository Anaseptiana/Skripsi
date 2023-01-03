
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">Pesanan</div>
            <div class="card-body">

                <?= $this->session->flashdata('message'); ?>
                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>No. Pesanan</th>
                            <th>Nama Mobil</th>
                            <th>Harga Mobil</th>
                            <th>Supir</th>
                            <th>Harga Supir</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        <?php if(count($pesanan) > 0) : ?>
                            <?php $i=1; foreach($pesanan as $data) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $data['no_pesanan']; ?></td>
                                <td><?= $data['nama_mobil']; ?></td>
                                <td>Rp. <?= numberFormat($data['harga_mobil']); ?></td>
                                <td><?= ($data['supir'] != null) ? 'Ya' : "-"; ?></td>
                                <td><?= ($data['harga_supir'] != null) ? $data['harga_supir'] : "-"; ?></td>
                                <td>Rp. <?= numberFormat($data['total_harga']); ?></td>
                                <td><?= statusPesanan($data['status']); ?></td>
                                <td>
                                    <a href="<?= base_url('customer/pesanan/detail/'.$data['id_pesanan']); ?>" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                            <?php $i++; endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td class="text-center" colspan="8">Tidak ada pesanan</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>