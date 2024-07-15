<!DOCTYPE html>
<html>
<?php $this->load->view('partials/header'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/stylesbayar.css'); ?>">
<?php $this->load->view('pengguna/navbar'); ?>
<?php $this->load->view('pengguna/sidebar'); ?>
</head>
<body>
    <div class="container">
        <h1>Pembayaran</h1>
        <p>Nama Wisata: <?php echo isset($wisata['nama_wisata']) ? $wisata['nama_wisata'] : 'Nama Wisata Tidak Tersedia'; ?></p>
        <p>Total Harga: <?php echo isset($total_harga) ? 'Rp ' . number_format($total_harga, 0, ',', '.') : 'Total Harga Tidak Tersedia'; ?></p>

        <!-- Form untuk upload bukti transaksi -->
        <?php echo form_open_multipart('Ctiket/insertkonfirmasi'); ?>
        <input type="hidden" name="total_harga" value="<?php echo isset($total_harga) ? $total_harga : ''; ?>">
        <input type="hidden" name="id_wisata" value="<?php echo isset($wisata['id_wisata']) ? $wisata['id_wisata'] : ''; ?>">

        <label for="bank_km">Bank Tujuan:</label>
        <select name="bank_km" id="bank_km" required>
            <option value="" disabled selected>Pilih Bank Tujuan</option>
            <option value="BCA">BCA</option>
            <option value="BNI">BNI</option>
            <option value="BRI">BRI</option>
            <option value="Mandiri">Mandiri</option>
            <!-- Tambahkan opsi bank lainnya sesuai kebutuhan -->
        </select>

        <label for="nomrek">Nomor Rekening:</label>
        <input type="text" name="nomrek" id="nomrek" required>

        <label for="nama">Nama Pemilik Rekening:</label>
        <input type="text" name="nama" id="nama" required>

        <label for="tgl_kunjungan">Tanggal Kunjungan:</label>
        <input type="date" name="tgl_kunjungan" id="tgl_kunjungan" required>

        <label for="userfile">Upload Bukti Transaksi:</label>
        <input type="file" name="userfile" id="userfile" required>

        <br><br>
        <button type="submit">Kirim</button>
        <?php echo form_close(); ?>
        <?php echo validation_errors('<div class="error-message">', '</div>'); ?>
    </div>
</body>
</html>
