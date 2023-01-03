<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <div class=" card">
        <div class="card-header"><a href="<?= base_url('administrator/supir/tambah'); ?>" class="btn btn-primary btn-sm">Tambah Supir</a></div>
        <div class=" card-body">
                <table class=" table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="text-left">No</th>
                            <th scope="col" class="text-left">Nama</th>
                            <th scope="col" class="text-left">Telp</th>
                            <th scope="col" class="text-left">Alamat</th>
                            <th scope="col" class="text-left">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (count($supir) == 0) : ?>
                            <th scope="col" class="text-center" colspan="11">Tidak ada data</th>
                        <?php endif; ?>

                        <?php $no = 1; ?>
                        <?php foreach ($supir as $data) : ?>
                            <tr>
                                <td scope="col" class="text-left"><?= $no; ?></td>
                                <td scope="col" class="text-left"><?= $data['nama_supir']; ?></td>
                                <td scope="col" class="text-left"><?= $data['telp']; ?></td>
                                <td scope="col" class="text-left"><?= $data['alamat']; ?></td>
                                <td scope="col" class="text-left"><?= checkStatusSupir($data['status']); ?></td>
                                <td scope="col" class="text-center">
                                    <a href="<?= base_url('administrator/supir/edit/' . $data['id_supir']); ?>" class="badge badge-success">Edit</a>
                                    <a onclick="return confirm('Apa anda yakin?')" href="<?= base_url('administrator/supir/hapus/' . $data['id_supir']); ?>" class="badge badge-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
