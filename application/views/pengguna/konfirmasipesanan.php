<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('partials/header'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/styleskonfirm.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
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
            background-color: #343a40;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 999;
            position: fixed;
            top: 0;
            right: 0;
            width: calc(100% - 250px);
        }

        .navbar-brand img {
            height: 50px;
            width: 140px;
        }

        .main-content {
            flex: 1;
            margin-top: 50px;
            margin-left: 280px;
            overflow-y: auto;
            padding: 20px;
            height: calc(100vh - 50px);
            background: linear-gradient(to right, #e0f7fa, #ffffff); /* Warna gradient dari biru muda ke putih */
        }

        .container {
            margin-top: 20px;
        }

        .card {
            padding: 30px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }

        .card h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .form-group {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .btn-submit,
        .btn-back {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            width: 48%;
        }

        .btn-back {
            background-color: #4CAF50;
        }

        .btn-submit:hover {
            background-color: #0069d9;
        }

        .btn-back:hover {
            background-color: #45a049;
        }

        .note {
            margin-top: 20px;
            padding: 20px;
            background: #f9f9f9;
            border-left: 5px solid #007bff;
            border-radius: 5px;
        }

        .note h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .note p {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .fa-ticket-alt {
            color: #007bff;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <?php $this->load->view('pengguna/sidebar'); ?>
        <div class="main-content">
            <?php $this->load->view('pengguna/navbar'); ?>
            <div class="main-container">
                <div class="container">
                    <div class="card">
                        <h1><i class="fas fa-ticket-alt"></i> Konfirmasi Pemesanan Tiket</h1>
                        <?php if (isset($konfirmasi)) { ?>
                            <p><strong>Nama Pemesan:</strong> <?php echo $konfirmasi['nama_pemesan']; ?></p>
                            <p><strong>Jenis Kelamin:</strong> <?php echo $konfirmasi['jenis_kelamin']; ?></p>
                            <p><strong>Jumlah Tiket:</strong> <?php echo $konfirmasi['jumlah_tiket']; ?></p>
                            <p><strong>Tanggal Kunjungan:</strong> <?php echo $konfirmasi['tgl_kunjungan']; ?></p>
                            <p><strong>Total Harga:</strong> Rp
                                <?php echo isset($konfirmasi['total_harga']) ? number_format($konfirmasi['total_harga'], 0, ',', '.') : ''; ?>
                            </p>
                        <?php } else { ?>
                            <p>Data pemesanan tidak ditemukan.</p>
                        <?php } ?>
                        <div class="form-group">
                            <a href="<?php echo base_url('Ctiket/lakukan_pembayaran'); ?>" class="btn-submit">Lanjutkan
                                Pembayaran</a>
                            <button type="button" class="btn-back" onclick="history.back()">Batal</button>
                        </div>
                        <div class="card note">
                            <h2>Catatan Penting</h2>
                            <p><i class="fas fa-info-circle"></i> Tiket tidak bisa refund.</p>
                            <p><i class="fas fa-calendar-alt"></i> Tiket hanya berlaku di tanggal yang terpilih.</p>
                            <p><i class="fas fa-check-circle"></i> Konfirmasi instan setelah pembayaran.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
