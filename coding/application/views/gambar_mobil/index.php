Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header"><a href="<?= base_url('administrator/mobil/ist-gambar/tambah/'.$this->uri->segment(4)); ?>" class="btn btn-primary btn-sm">Tambah Gambar</a></div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Mobil</th>
                                <th class="text-center">Default</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($gambar) == 0) {
                                echo '<td colspan="13" class="text-center">Tidak ada data</td>';
                            }
                            ?>
                            <?php $i = 1; ?>
                            <?php foreach ($gambar as $td) : ?>
                                <tr>
                                    <td scope="row"><?= $i + $this->uri->segment(5); ?></td>
                                    <td><img src="<?= base_url('assets/img/mobil/gambar/' . $td['gambar']); ?>" alt="<?= $td['nama_mobil']; ?>" width="100px"></td>
                                    <td><?= $td['nama_mobil']; ?></td>
                                    <td class="text-center"><?= $td['is_default']; ?></td>
                                    <td><?= $td['created_at']; ?></td>
                                    <td><?= $td['updated_at']; ?></td>
                                    <td class="text-center">
                                        <!-- <a href="" class="badge badge-success">Edit</a> -->
                                        <a onclick="return confirm('Apa anda yakin?')" href="<?= base_url('administrator/mobil/list-gambar/hapus/' . $td['id_gambar_mobil']); ?>" class="badge badge-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <?php echo $pagination; ?>
                </div>
            </div>



        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content