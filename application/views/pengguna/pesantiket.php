<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('partials/header'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/stylesform.css'); ?>">
    <?php $this->load->view('pengguna/navbar'); ?>
    <?php $this->load->view('pengguna/sidebar'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pembelian Tiket</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Formulir Pembelian Tiket</h1>
            <form action="<?php echo base_url('Ctiket/konfirmasi_pemesanan'); ?>" method="post">
                <input type="hidden" name="id_wisata" value="<?php echo isset($wisata['id_wisata']) ? $wisata['id_wisata'] : ''; ?>">
                
                <div class="form-group">
                    <label for="nama_wisata">Nama Wisata:</label>
                    <input type="text" id="nama_wisata" name="nama_wisata" value="<?php echo isset($wisata['nama_wisata']) ? $wisata['nama_wisata'] : ''; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="harga_tiket">Harga Tiket (Rp):</label>
                    <input type="text" id="harga_tiket" name="harga_tiket" value="<?php echo isset($wisata['harga_tiket']) ? number_format($wisata['harga_tiket'], 0, ',', '.') : ''; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="nama_pemesan">Nama Pemesan:</label>
                    <input type="text" id="nama_pemesan" name="nama_pemesan" required>
                </div>
                
                <div class="form-group">
                    <label for="email_pemesan">Email Pemesan:</label>
                    <input type="email" id="email_pemesan" name="email_pemesan" required>
                </div>
                
                <div class="form-group">
                    <label for="jumlah_tiket">Jumlah Tiket:</label>
                    <input type="number" id="jumlah_tiket" name="jumlah_tiket" required>
                </div>
                
                <div class="form-group right-align">
                    <button type="submit">Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>
    <?php $this->load->view('partials/footer'); ?>
</body>
</html>
