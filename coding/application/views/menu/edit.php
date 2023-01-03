<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card">
                <div class="card-header">
                    Edit Menu
                </div>

                <div class="card-body">
                    <form action="<?= base_url('administrator/menu/edit_menu/' . $menu['id']); ?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="menu" placeholder="Menu name" value="<?= $menu['menu']; ?>">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Button trigger modal -->