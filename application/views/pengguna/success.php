<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('partials/header'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.pembayaran.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f7f9fc;
            color: #333;
        }

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
            margin-top: 70px;
            margin-left: 250px;
            overflow-y: auto;
            padding: 20px;
            height: calc(100vh - 50px);
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
            text-align: center;
            position: relative;
        }

        .card h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .card p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .card-icon {
            width: 60px;
            height: 60px;
            position: absolute;
            top: -30px;
            left: calc(50% - 30px);
            background-color: #007bff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .card-icon i {
            color: white;
            font-size: 32px;
        }

        .btn-submit,
        .btn-back {
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .btn-submit {
            background-color: #007bff;
            color: white;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .btn-back {
            background-color: #4CAF50;
            color: white;
            margin-left: 10px;
        }

        .btn-back:hover {
            background-color: #388e3c;
        }

        .instructions {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ecef;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .instructions h3 {
            margin-bottom: 10px;
            color: #007bff;
        }

        .instructions ul {
            list-style-type: none;
            padding-left: 0;
        }

        .instructions li {
            margin-bottom: 10px;
        }

        .instructions li strong {
            display: block;
            margin-bottom: 5px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM1k6oU9R2voT+L3n4JvlV0V7Aj0B+0+6LvQ5X9" crossorigin="anonymous">
</head>

<body>
    <div class="page-wrapper">
        <?php $this->load->view('pengguna/sidebar'); ?>
        <div class="main-content">
            <?php $this->load->view('pengguna/navbar'); ?>
            <div class="container">
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <h1>Pembayaran Sukses!</h1>
                    <p>Terima kasih telah membeli tiket wisata. Berikut adalah detail pembelian Anda:</p>
                    <p>Id Pesanan: <?= isset($id_pesanan) ? $id_pesanan : 'Data tidak tersedia'; ?></p>
                    <p>Total Harga: Rp. <?= isset($total_harga) ? number_format($total_harga, 0, ',', '.') : 'Data tidak tersedia'; ?></p>
                    <p>Tanggal Kunjungan: <?= isset($tgl_kunjungan) ? $tgl_kunjungan : 'Data tidak tersedia'; ?></p>
                    <p>Mohon simpan tiket ini dan tunjukkan saat tiba di lokasi wisata.</p>
                    <a href="<?= base_url('Ctiket/cetakpdf'); ?>" class="btn-submit">Cetak Tiket</a>
                    <a href="<?= base_url('Ctiket'); ?>" class="btn-back">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
