<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header"><a href="<?= base_url('administrator/customer/tambah'); ?>" class="btn btn-primary btn-sm">Tambah Customer</a></div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama customer</th>
                                <th>Alamat</th>
                                <th>Telp</th>
                                <th>Email</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($customers) == 0) {
                                echo '<td colspan="13" class="text-center">Tidak ada data</td>';
                            }
                            ?>
                            <?php $i = 1; ?>
                            <?php foreach ($customers as $td) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $td['nama_customer']; ?></td>
                                    <td><?= $td['alamat']; ?></td>
                                    <td><?= $td['telp']; ?></td>
                                    <td><?= $td['email']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('administrator/customer/edit/' . $td['id_customer']); ?>" class="badge badge-success">Edit</a>
                                        <a onclick="return confirm('Apa anda yakin?')" href="<?= base_url('administrator/customer/hapus/' . $td['id_customer']); ?>" class="badge badge-danger">Hapus</a>
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