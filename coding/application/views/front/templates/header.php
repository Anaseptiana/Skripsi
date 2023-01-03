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

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <ul class="left-info">
                        <li><a href="#"><i class="fa fa-envelope"></i><?= $setting['email']; ?></a></li>
                        <li><a href="#"><i class="fa fa-phone"></i><?= $setting['telp']; ?></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="right-icons">
                         <?php if ($setting['whatsapp']) : ?>
                            <li>
                                <a href="https://api.whatsapp.com/send?phone=<?= $setting['whatsapp']; ?>" target="_blank"><i class="fa fa-whatsapp"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if ($setting['facebook']) : ?>
                            <li><a href="<?= $setting['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <?php endif; ?>

                        <?php if ($setting['twitter']) : ?>
                            <li><a href="<?= $setting['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <?php endif; ?>
                        <!-- <li><a href="#"><i class="fa fa-linkedin"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url(); ?>">
                    <h2><?= $setting['nama_website']; ?></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item <?php if ($menu === 'home') {
                                                echo 'active';
                                            } ?>">
                            <a class="nav-link" href="<?= base_url(''); ?>">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($menu === 'cars') {
                                                    echo 'active';
                                                } ?>" href="<?= base_url('cars'); ?>">Cars</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link <?php if ($menu === 'about') {
                                                                    echo 'active';
                                                                } ?>" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= base_url('about'); ?>">About Us</a>
                                <a class="dropdown-item" href="<?= base_url('testimonials'); ?>">Testimonials</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('contact'); ?>">Contact Us</a>
                        </li>
                            <?php if($customer != null) : ?>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        <?= $customer['nama_customer']; ?>
                                    </a>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= base_url('customer'); ?>">Profile</a>
                                        <a class="dropdown-item" href="<?= base_url('customer/logout'); ?>">Logout</a>
                                    </div>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('login'); ?>">Login</a>
                                </li>
                            <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>