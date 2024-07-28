<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('partials/header'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/stylesdetail.css'); ?>">
    <style>
        .page-wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
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
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 999;
            position: fixed;
            top: 0;
            left: 250px; /* Adjust to align with sidebar */
            width: calc(100% - 250px);
            height: 70px;
        }

        .navbar-brand img {
            height: 50px;
            width: 140px;
        }

        .main-content {
            flex: 1;
            margin-top: 70px;
            margin-left: 250px;
            padding: 30px;
            overflow-y: auto;
            height: calc(100vh - 70px); /* Adjust for navbar height */
            background: linear-gradient(to right, #e0f7fa, #ffffff); /* Warna gradient dari biru muda ke putih */
        }

        .container {
            margin-top: 20px;
        }

        .card {
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px; /* Ensure spacing between sections */
        }

        .section-title {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #007bff;
        }

        .section-content {
            font-size: 1em;
            line-height: 1.6;
        }

        .wisata-img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 20px auto;
        }

        .pesan-button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            margin-top: 20px;
            font-size: 1.1em;
        }

        .pesan-button:hover {
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
                <img src="<?= base_url('uploads/' . $tempat['foto']); ?>" alt="<?= $tempat['nama_wisata']; ?>" class="wisata-img">
                <h2 class="title"><?php echo $tempat['nama_wisata']; ?></h2>

                <div id="overview" class="card">
                    <h3 class="section-title">Deskripsi</h3>
                    <p class="section-content"><?php echo nl2br($tempat['deskripsi']); ?></p>
                </div>

                <div id="harga" class="card">
                    <h3 class="section-title">Harga Tiket Masuk</h3>
                    <p class="section-content"><strong>Rp <?php echo number_format($tempat['harga_tiket'], 0, ',', '.'); ?></strong></p>
                </div>

                <div id="lokasi" class="card">
                    <h3 class="section-title">Lokasi Wisata</h3>
                    <p class="section-content"><?php echo $tempat['lokasi']; ?></p>
                </div>

                <div id="jam_operasional" class="card">
                    <h3 class="section-title">Jam Operasional</h3>
                    <p class="section-content"><?php echo nl2br($tempat['jam_operasional']); ?></p>
                </div>

                <div id="alamat_wisata" class="card">
                    <h3 class="section-title">Alamat Lengkap</h3>
                    <p class="section-content"><?php echo nl2br($tempat['alamat_wisata']); ?></p>
                </div>

                <div id="nomor_telepon" class="card">
                    <h3 class="section-title">No. Telepon</h3>
                    <p class="section-content"><?php echo $tempat['no_hp_wisata']; ?></p>
                </div>

                <div id="no_rek" class="card">
                    <h3 class="section-title">No. Rekening</h3>
                    <p class="section-content"><?php echo $tempat['no_rek']; ?></p>
                </div>

                <div id="sosial_media" class="card">
                    <h3 class="section-title">Sosial Media</h3>
                    <p class="section-content"><?php echo nl2br($tempat['sosmed']); ?></p>
                </div>

                <a href="<?php echo base_url('Ctiket/pesan/' . $tempat['id_wisata']); ?>" class="pesan-button">Pesan Tiket</a>
            </div>
        </div>
    </div>
</body>

</html>
