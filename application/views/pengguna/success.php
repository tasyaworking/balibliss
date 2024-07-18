<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('partials/header'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.pembayaran.css'); ?>">
    <style>
        .page-wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden; /* Ensure no scrolling on the main wrapper */
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
            background-color: #1076e3;
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
            margin-top: 70px; /* Adjust margin to push content below navbar */
            margin-left: 250px; /* Adjust margin to make space for sidebar */
            overflow-y: auto; /* Enable vertical scrolling */
            padding: 20px;
            height: calc(100vh - 70px); /* Full height minus navbar height */
        }

        .container {
            margin-top: 20px;
        }

        .card {
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-back {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-back:hover {
            background-color: #c82333;
        }

        .btn-submit {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0069d9;
        }
    </style>
<head>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <?php $this->load->view('pengguna/sidebar'); ?>
        <div class="main-content">
            <?php $this->load->view('pengguna/navbar'); ?>
    	<div class="main-container">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Sukses</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Pembayaran Sukses</h1>
            <p>Id Pesanan: <?php echo isset($id_pesanan) ? $id_pesanan : 'Data tidak tersedia'; ?></p>
            <p>Total Harga: Rp. <?php echo isset($total_harga) ? number_format($total_harga, 0, ',', '.') : 'Data tidak tersedia'; ?></p>
            <p>Tanggal Kunjungan: <?php echo isset($tgl_kunjungan) ? $tgl_kunjungan : 'Data tidak tersedia'; ?></p>
            <a href="<?php echo base_url('Ctiket/cetaktiket'); ?>">Cetak Tiket</a>
        </div>
    </div>
</body>
</html>

