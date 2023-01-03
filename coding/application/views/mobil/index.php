<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header"><a href="<?= base_url('administrator/mobil/tambah'); ?>" class="btn btn-primary btn-sm">Tambah Mobil</a></div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mobil</th>
                                <th>Harga Dalam Kota</th>
                                <th>Harga Luar Kota</th>
                                <th class='text-center'>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($mobil) == 0) {
                                echo '<td colspan="13" class="text-center">Tidak ada data</td>';
                            }
                            ?>
                            <?php $i = 1; ?>
                            <?php foreach ($mobil as $td) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $td['nama_mobil']; ?></td>
                                    <td>Rp. <?= numberFormat($td['harga_dalam_kota']); ?></td>
                                    <td>Rp. <?= numberFormat($td['harga_luar_kota']); ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('administrator/mobil/list-gambar/' . $td['id_mobil']); ?>" class="badge badge-info">List Gambar</a>
                                        <a href="<?= base_url('mobil/' . $td['slug']); ?>" class="badge badge-secondary">Detail</a>
                                        <a href="<?= base_url('administrator/mobil/edit/'.$td['id_mobil']); ?>" class="badge badge-success">Edit</a>
                                        <a onclick="return confirm('Apa anda yakin?')" href="<?= base_url('administrator/mobil/hapus/'.$td['id_mobil']); ?>" class="badge badge-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->