<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header"><a href="<?= base_url('administrator/testimoni/tambah'); ?>" class="btn btn-primary btn-sm">Tambah Testimoni</a></div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Pesan</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($testimoni) == 0) {
                                echo '<td colspan="13" class="text-center">Tidak ada data</td>';
                            }
                            ?>
                            <?php $i = 1; ?>
                            <?php foreach ($testimoni as $td) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $td['nama']; ?></td>
                                    <td><?= $td['pesan']; ?></td>
                                    <td><img src="<?= base_url('assets/img/testimoni/' . $td['foto']); ?>" alt="<?= $td['foto']; ?>" width="100px"></td>
                                    <td><?= checkActive($td['status']); ?></td>
                                    <td><?= $td['created_at']; ?></td>
                                    <td><?= $td['updated_at']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('administrator/testimoni/edit/' . $td['id_testimoni']); ?>" class="badge badge-success">Edit</a>
                                        <a onclick="return confirm('Apa anda yakin?')" href="<?= base_url('administrator/testimoni/hapus/' . $td['id_testimoni']); ?>" class="badge badge-danger">Hapus</a>
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