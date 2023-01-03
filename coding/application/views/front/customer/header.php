<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title><?= $setting['nama_website']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.css">
    <style>
        .pt {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
          <a class="navbar-brand" href="<?= base_url('/'); ?>"><?= $customer['nama_customer']; ?></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
              <a class="nav-link" href="<?= base_url('customer'); ?>">Home</a>
              <a class="nav-link" href="<?= base_url('customer/pesanan'); ?>">Pesanan</a>
              <a class="nav-link" href="<?= base_url('customer/logout'); ?>">Logout</a>
            </div>
          </div>
      </div>
    </nav>