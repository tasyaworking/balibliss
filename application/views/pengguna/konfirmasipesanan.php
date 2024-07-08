<!-- application/views/pengguna/konfirmasi_pemesanan.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pemesanan Tiket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            width: 400px; /* Adjust as needed */
        }

        h1 {
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        .form-group {
            margin-top: 20px;
            text-align: center;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
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
