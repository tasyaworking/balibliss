
<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/stylesform.css'); ?>">
<?php $this->load->view('pengguna/navbar'); ?>
<?php $this->load->view('pengguna/sidebar'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pemesanan Tiket</title>
</head>
<body>
    <div class="container">
        <h1>Konfirmasi Pemesanan</h1>
        <?php if (isset($konfirmasi)) { ?>
            <p>Nama Pemesan: <?php echo $konfirmasi['nama_pemesan']; ?></p>
            <p>Email Pemesan: <?php echo $konfirmasi['email_pemesan']; ?></p>
            <p>Jumlah Tiket: <?php echo $konfirmasi['jumlah_tiket']; ?></p>
            <p>Total Harga: Rp <?php echo isset($konfirmasi['total_harga']) ? number_format($konfirmasi['total_harga'], 0, ',', '.') : ''; ?></p>
        <?php } else { ?>
            <p>Data pemesanan tidak ditemukan.</p>
        <?php } ?>
        <div class="form-group">
            <a href="<?php echo base_url('Ctiket/lakukan_pembayaran'); ?>" class="button">Lanjutkan Pembayaran</a>
        </div>
    </div>
</body>
</html>
