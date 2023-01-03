<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Pesan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data->result_array() as $pesan) : ?>
                                <tr>
                                    <td scope="row"><?= $i + $this->uri->segment(4); ?></td>
                                    <td><?= $pesan['nama']; ?></td>
                                    <td><?= $pesan['email']; ?></td>
                                    <td><?= $pesan['subject']; ?></td>
                                    <td><?= substr($pesan['isi_pesan'], 0, 30); ?>...</td>
                                    <td>
                                        <a href="<?= base_url('administrator/pesan/detail/' . $pesan['id_pesan']); ?>" class="badge badge-info">Detail</a>
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
<!-- End of Main Content -->