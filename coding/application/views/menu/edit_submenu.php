
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
                        <input type="text" class="form-control" name="title" placeholder="Submenu title" value="<?= $submenu['title']; ?>">
                    </div>

                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">-Select Menu-</option>
                            <?php foreach ($menu as $m) : ?>
                                <?php if($m['id'] == $submenu['menu_id']) : ?>
                                    <option value="<?= $m['id']; ?>" selected=""><?= $m['menu']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="url" placeholder="Submenu url" value="<?= $submenu['url']; ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="icon" placeholder="Submenu icon" value="<?= $submenu['icon']; ?>">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" <?= ($submenu['is_active'] == 1) ? 'checked' : '' ?>>
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

      
