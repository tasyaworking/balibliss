<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran Sukses</title>
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

        .card {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .card h1 {
            margin-bottom: 20px;
        }

        .card p {
            margin-bottom: 10px;
        }

        .card a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .card a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Konfirmasi Pembayaran Sukses</h1>
        <p>Kode Order: <?php echo isset($kd_order) ? $kd_order : 'Data tidak tersedia'; ?></p>
        <p>Total Harga: Rp. <?php echo isset($total_harga) ? number_format($total_harga, 0, ',', '.') : 'Data tidak tersedia'; ?></p>
        <p>Tanggal Kunjungan: <?php echo isset($tgl_kunjungan) ? $tgl_kunjungan : 'Data tidak tersedia'; ?></p>
        <a href="<?php echo base_url(); ?>">Kembali ke Beranda</a>
    </div>
</body>
</html>
