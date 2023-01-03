<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header"><a href="<?= base_url('administrator/blog/tambah'); ?>" class="btn btn-primary btn-sm">Tambah Blog</a></div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Background</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($blogs) == 0) {
                                echo '<td colspan="13" class="text-center">Tidak ada data</td>';
                            }
                            ?>
                            <?php $i = 1; ?>
                            <?php foreach ($blogs as $td) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $td['judul']; ?></td>
                                    <td><?= $td['name']; ?></td>
                                    <td><img src="<?= base_url('assets/img/blog/' . $td['background']); ?>" alt="<?= $td['background']; ?>" width="100px"></td>
                                    <td><?= $td['created_at']; ?></td>
                                    <td><?= $td['updated_at']; ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('blog/' . $td['slug']); ?>" class="badge badge-info">Detail</a>
                                        <a href="<?= base_url('administrator/blog/edit/' . $td['id_blog']); ?>" class="badge badge-success">Edit</a>
                                        <a onclick="return confirm('Apa anda yakin?')" href="<?= base_url('administrator/blog/hapus/' . $td['id_blog']); ?>" class="badge badge-danger">Hapus</a>
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