<!DOCTYPE html>
<html>
<head>
    <title>Halaman Pembayaran</title>
    <style>
        /* Reset default margin and padding */
        body, html {
            margin: 0;
            padding: 0;
        }

        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        h1, h2 {
            color: #333;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 24px;
            margin-top: 20px;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        input[type="text"], input[type="date"], input[type="file"] {
            width: calc(100% - 20px); /* Adjust width for better appearance */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        select {
            width: calc(100% - 20px); /* Adjust width for better appearance */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            font-size: 14px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #f44336;
            margin-top: 5px;
        }

        .success-message {
            color: #4CAF50;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Halaman Pembayaran</h1>
        <h2>Detail Pembayaran</h2>
        <p>Nama Wisata: <?php echo isset($wisata['nama_wisata']) ? $wisata['nama_wisata'] : 'Nama Wisata Tidak Tersedia'; ?></p>
        <p>Total Harga: <?php echo isset($total_harga) ? 'Rp ' . number_format($total_harga, 0, ',', '.') : 'Total Harga Tidak Tersedia'; ?></p>

        <!-- Form untuk upload bukti transaksi -->
        <?php echo form_open_multipart('Ctiket/success'); ?>
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
    </div>
</body>
</html>
