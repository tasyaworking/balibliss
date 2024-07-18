<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('partials/header'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/stylesform.css'); ?>">
    <style>
        .page-wrapper {
            display: flex;
            height: 100vh; /* Set the height to full viewport height */
            overflow: hidden; /* Ensure no scrolling on the main wrapper */
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .navbar {
            background-color: #1076e3;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 999;
            position: fixed;
            top: 0;
            right: 0;
            width: calc(100% - 250px);
        }

        .navbar-brand img {
            height: 50px;
            width: 140px;
        }

        .main-content {
            flex: 1;
            margin-top: 70px; /* Adjust margin to push content below navbar */
            margin-left: 90px; /* Adjust margin to make space for sidebar */
            overflow-y: auto; /* Enable vertical scrolling */
            padding: 30px;
            height: calc(100vh - 90px); /* Full height minus navbar height */
        }

        .container {
            margin-top: 20px;
        }

        .card {
            padding: 20px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-submit {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <?php $this->load->view('pengguna/sidebar'); ?>
        <div class="main-content">
            <?php $this->load->view('pengguna/navbar'); ?>
    <div class="container">
        <header>
            <h1>Dashboard Wisata</h1>
        </header>
        <div class="cards">
            <?php foreach($wisata as $w): ?>
                <div class="card">
                    <img src="<?=base_url()?>assets/img/<?=$w['foto']?>" alt="<?=$w['nama_wisata']?>">
                    <div class="card-content">
                        <h2><?=$w['nama_wisata']?></h2>
                        <p>Harga Tiket: Rp<?=$w['harga_tiket']?></p>
                        <div class="rating">
                            <?php for($i = 0; $i < 5; $i++): ?>
                                <i class="fa <?= $i < $w['rating'] ? 'fa-star' : 'fa-star-o' ?>"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
