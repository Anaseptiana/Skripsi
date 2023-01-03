<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $data_user['name']; ?>">
                    <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email" value="<?= $data_user['email']; ?>">
                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                </div>

                <!-- <div class="form-group">
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="">-Pilih Role-</option>
                        <?php foreach ($roles as $role) : ?>
                            <?php if ($role['id'] == $data_user['role_id']) : ?>
                                <option value="<?= $role['id']; ?>" selected=""><?= $role['role']; ?></option>
                            <?php else : ?>
                                <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('role_id'); ?></small>
                </div> -->

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" <?= ($data_user['is_active'] == 1) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="defaultCheck1">
                            Active?
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Button trigger modal -->