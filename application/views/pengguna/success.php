<!DOCTYPE html>
<html lang="id">
<head>
    <?php $this->load->view('partials/header'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.pembayaran.css'); ?>">
    <style>
        /* Tambahkan style Anda disini */
    </style>
</head>
<body>
    <div class="page-wrapper">
        <?php $this->load->view('pengguna/sidebar'); ?>
        <div class="main-content">
            <?php $this->load->view('pengguna/navbar'); ?>
            <div class="container">
                <div class="card">
                    <h1>Pembayaran Sukses</h1>
                    <p>Id Pesanan: <?= isset($id_pesanan) ? $id_pesanan : 'Data tidak tersedia'; ?></p>
                    <p>Total Harga: Rp. <?= isset($total_harga) ? number_format($total_harga, 0, ',', '.') : 'Data tidak tersedia'; ?></p>
                    <p>Tanggal Kunjungan: <?= isset($tgl_kunjungan) ? $tgl_kunjungan : 'Data tidak tersedia'; ?></p>
                    <a href="<?= base_url('Ctiket/cetakpdf'); ?>">Cetak Tiket</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
