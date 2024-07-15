<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempat Wisata</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/stylestiket.css'); ?>"> <!-- Memuat file CSS terpisah -->
    <?php $this->load->view('partials/header', ['title' => 'Tempat Wisata']); ?>
</head>
<body>
    <?php $this->load->view('pengguna/navbar'); ?>
    <div class="main-container">
        <?php $this->load->view('pengguna/sidebar'); ?>
        <div class="content-container">
            <div class="wisata-container">
                <?php if (!empty($wisata)): ?>
                    <?php foreach ($wisata as $tempat): ?>
                        <div class="wisata-card">
                            <img src="<?= base_url('assets/img/wisata/' . $tempat['foto']); ?>" alt="<?= $tempat['nama_wisata']; ?>" class="wisata-img">
                            <h3><?= $tempat['nama_wisata']; ?></h3>
                            <p class="wisata-description"><?= $tempat['deskripsi']; ?></p>
                            <p class="wisata-price">Harga: Rp <?= number_format($tempat['harga_tiket'], 0, ',', '.'); ?></p>
                            <p class="wisata-location">Lokasi: <?= $tempat['lokasi']; ?></p>
                            <a href="<?= base_url('Ctiket/detailwisata/' . $tempat['id_wisata']); ?>" class="pesan-button">Pesan Tiket</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Maaf, tidak ada data wisata yang tersedia saat ini.</p>
                <?php endif; ?>
            </div>
            <?php $this->load->view('partials/footer'); ?>
        </div>
    </div>
</body>
</html>
