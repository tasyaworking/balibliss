
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<?php $this->load->view('partials/header'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/stylesform.css'); ?>">
<?php $this->load->view('pengguna/navbar'); ?>
<?php $this->load->view('pengguna/sidebar'); ?>
<body>
    <div class="main-container">
        <div class="container">
            <h2><?php echo $tempat['nama']; ?></h2>
            <img src="<?php echo base_url('assets/img/wisata/' . $tempat['foto']); ?>" alt="<?php echo $tempat['nama']; ?>">
            <div id="overview" class="detail-content">
                <h3>Overview</h3>
                <p><?php echo nl2br($tempat['deskripsi']); ?></p>
            </div>
            <div id="harga" class="detail-content">
                <h3>Harga</h3>
                <p><strong>Rp <?php echo number_format($tempat['harga_tiket'], 0, ',', '.'); ?></strong></p>
            </div>
            <div id="lokasi" class="detail-content">
                <h3>Lokasi</h3>
                <p><?php echo $tempat['lokasi']; ?></p>
            </div>
            <div id="jam_operasional" class="detail-content">
                <h3>Jam Operasional</h3>
                <p><?php echo nl2br($tempat['jam_operasional']); ?></p>
            </div>
            <div id="alamat" class="detail-content">
                <h3>Alamat</h3>
                <p><?php echo nl2br($tempat['alamat']); ?></p>
            </div>
            <div id="nomor_telepon" class="detail-content">
                <h3>No. Telp</h3>
                <p><?php echo $tempat['nomor_telepon']; ?></p>
            </div>
            <div id="sosial_media" class="detail-content">
                <h3>Sosial Media</h3>
                <p><?php echo nl2br($tempat['sosial_media']); ?></p>
            </div>
            <a href="<?php echo base_url('Ctiket/pesan/' . $tempat['id']); ?>" class="pesan-button">Pesan Tiket</a>
        </div>
    </div>
</body>
</html>
