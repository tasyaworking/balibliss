<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('partials/header'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/stylesdashboard.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
        }

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
            background-color: #007bff;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 999;
            position: fixed;
            top: 0;
            right: 0;
            width: calc(100% - 250px);
            padding: 0 20px;
        }

        .navbar-brand img {
            height: 50px;
            width: 140px;
        }

        .main-content {
            flex: 1;
            margin-top: 40px;
            margin-left: 90px;
            overflow-y: auto;
            padding: 20px 40px;
            background-color: #f0f4f8;
        }

        .welcome-message {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        .wisata-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .wisata-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 700px;
            text-align: center;
            transition: transform 0.2s;
        }

        .wisata-card:hover {
            transform: scale(1.05);
        }

        .wisata-img {
            width: 100%;
            border-radius: 10px;
            height: 200px;
            object-fit: cover;
        }

        .wisata-card h3 {
            margin: 10px 0;
            font-size: 30px;
            color: #333;
        }

        .wisata-description,
        .wisata-price,
        .wisata-location {
            margin: 5px 0;
            font-size: 25px;
            color: #555;
        }

        .pesan-button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }

        .pesan-button:hover {
            background-color: #0056b3;
        }

        .icon {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .fa-ticket-alt {
            color: #007bff;
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
                <div class="welcome-message">
                    <h2>Selamat Datang !</h2>
                    <p>Rencanakan perjalanan wisata Anda dengan mudah dan cepat. Pilih dari berbagai destinasi indah di Bali dan nikmati pengalaman yang tak terlupakan!</p>
                </div>
                <div class="wisata-container">
                    <?php if (!empty($wisata)): ?>
                    <?php foreach ($wisata as $tempat): ?>
                    <div class="wisata-card">
                        <img src="<?= base_url('uploads/' . $tempat['foto']); ?>"
                            alt="<?= $tempat['nama_wisata']; ?>" class="wisata-img">
                        <h3><?= $tempat['nama_wisata']; ?></h3>
                        <p class="wisata-description"><?= $tempat['deskripsi_singkat']; ?></p>
                        <p class="wisata-price">Harga: Rp <?= number_format($tempat['harga_tiket'], 0, ',', '.'); ?></p>
                        <p class="wisata-location">Lokasi: <?= $tempat['lokasi']; ?></p>
                        <a href="<?= base_url('Ctiket/detailwisata/' . $tempat['id_wisata']); ?>"
                            class="pesan-button"><i class="fas fa-ticket-alt icon"></i> Beli Sekarang</a>
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
