<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">Pesan dari <?= $pesan['nama']; ?> | Email : <?= $pesan['email']; ?></div>
                        <div class="col-lg-6" align="right"><?= $pesan['created_at']; ?></div>
                    </div>
                </div>
                <div class="card-body">
                    <h5><?= $pesan['subject']; ?></h5><br>
                    <p><?= $pesan['isi_pesan']; ?></p>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->