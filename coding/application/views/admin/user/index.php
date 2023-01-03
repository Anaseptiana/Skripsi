<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>

    <?= $this->session->flashdata('message'); ?>

    <div class=" card">
        <div class="card-header"><a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahUserModal">Tambah User</a></div>
        <div class=" card-body">
            <table class=" table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-left">No</th>
                        <th scope="col" class="text-left">Nama</th>
                        <th scope="col" class="text-left">Email</th>
                        <th scope="col" class="text-left">Status</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (count($users) == 0) : ?>
                        <th scope="col" class="text-center" colspan="11">Tidak ada data</th>
                    <?php endif; ?>

                    <?php $no = 1; ?>
                    <?php foreach ($users as $data) : ?>
                        <tr>
                            <td scope="col" class="text-left"><?= $no; ?></td>
                            <td scope="col" class="text-left"><?= $data['name']; ?></td>
                            <td scope="col" class="text-left"><?= $data['email']; ?></td>
                            <td scope="col" class="text-left"><?= checkActive($data['is_active']); ?></td>
                            <td scope="col" class="text-center">
                                <a href="<?= base_url('administrator/admin/edit_user/' . $data['id']); ?>" class="badge badge-success">Edit</a>
                                <a onclick="return confirm('Apa anda yakin?')" href="<?= base_url('administrator/admin/hapus_user/' . $data['id']); ?>" class="badge badge-danger">Hapus</a>
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


<div class="modal fade" id="tambahUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <input type="hidden" name="insert_user" value="user">

                    <div class="form-group">
                        <label for="nama">Nama User</label>
                        <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="<?= set_value('email'); ?>">
                        <small class="form-text text-danger"><?= form_error('email'); ?></small>
                    </div>

                    <!-- <div class="form-group">
                        <label for="role_id">Role</label>
                        <select name="role_id" class="form-control">
                            <?php foreach ($roles as $role) : ?>
                                <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('role_id'); ?></small>
                    </div> -->

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>