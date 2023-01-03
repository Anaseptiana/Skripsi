<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header"><a href="<?= base_url('administrator/banner/tambah'); ?>" class="btn btn-primary btn-sm">Tambah Banner</a></div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Sub Judul</th>
                                <th>Nama link</th>
                                <th>link</th>
                                <th>Gambar</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($banner) == 0) {
                                echo '<td colspan="13" class="text-center">Tidak ada data</td>';
                            }
                            ?>
                            <?php $i = 1; ?>
                            <?php foreach ($banner as $td) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $td['judul']; ?></td>
                                    <td><?= $td['sub_judul']; ?></td>
                                    <td><?= $td['nama_link']; ?></td>
                                    <td><?= $td['link']; ?></td>
                                    <td><img src="<?= base_url('assets/img/banner/' . $td['gambar']); ?>" alt="<?= $td['gambar']; ?>" width="100px"></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('administrator/banner/edit/' . $td['id_banner']); ?>" class="badge badge-success">Edit</a>
                                        <a onclick="return confirm('Apa anda yakin?')" href="<?= base_url('administrator/banner/hapus/' . $td['id_banner']); ?>" class="badge badge-danger">Hapus</a>
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