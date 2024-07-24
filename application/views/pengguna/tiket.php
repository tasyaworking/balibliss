<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('partials/header', ['title' => 'Tempat Wisata']); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/stylestiket.css'); ?>">
    <style>
        .page-wrapper {
            display: flex;
            height: 100vh;
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
            margin-left: 250px; /* Adjust margin to make space for sidebar */
            overflow-y: auto; /* Enable vertical scrolling */
            padding: 20px;
            height: calc(100vh - 70px); /* Full height minus navbar height */
        }

        .container {
            margin-top: 20px;
        }

        .card {
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-back {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-back:hover {
            background-color: #c82333;
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

        .wisata-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .wisata-card {
            width: calc(33.333% - 20px);
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            padding: 20px;
        }

        .wisata-img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        .wisata-description {
            margin: 10px 0;
            color: #666;
        }

        .wisata-price {
            margin: 10px 0;
            color: #1076e3;
            font-weight: bold;
        }

        .pesan-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
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
            
            <div class="content-container">
                <div class="wisata-container">
                    <?php if (!empty($wisata)): ?>
                        <?php foreach ($wisata as $tempat): ?>
                            <div class="wisata-card">
                                <img src="<?= base_url('uploads/' . $tempat->foto); ?>" alt="<?= $tempat->nama_wisata; ?>" class="wisata-img">
                                <h3><?= $tempat->nama_wisata; ?></h3>  
                                <p class="wisata-description"><?= $tempat->deskripsi_singkat; ?></p>
                                <p class="wisata-price">Harga: Rp <?= number_format((float)$tempat->harga_tiket, 0, ',', '.'); ?></p>
                                <a href="<?= base_url('Ctiket/detailwisata/' . $tempat->id_wisata); ?>" class="pesan-button">Pesan Tiket</a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Maaf, tidak ada data wisata yang tersedia saat ini.</p>
                    <?php endif; ?>
                </div>
                
                <?php $this->load->view('partials/footer'); ?>
            </div>
        </div>
    </div>
</body>
</html>
