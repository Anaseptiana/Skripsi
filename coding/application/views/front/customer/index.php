
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <span>Profile</span>
                <a href="<?= base_url('customer/edit'); ?>" class="btn btn-info btn-sm float-right">Edit</a>
            </div>
            <div class="card-body">
                
                <?= $this->session->flashdata('message'); ?>

                <table class="table table-borderless">
                    <tr>
                        <th>Nama</th>
                        <td><?= $customer['nama_customer']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $customer['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Telp</th>
                        <td><?= $customer['telp']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= $customer['alamat']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>