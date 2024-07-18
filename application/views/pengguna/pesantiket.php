<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('partials/header'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/stylesform.css'); ?>">
    <style>
        .page-wrapper {
            display: flex;
            height: 100vh; /* Set the height to full viewport height */
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
            margin-left: 90px; /* Adjust margin to make space for sidebar */
            overflow-y: auto; /* Enable vertical scrolling */
            padding: 30px;
            height: calc(100vh - 90px); /* Full height minus navbar height */
        }

        .container {
            margin-top: 20px;
        }

        .card {
            padding: 20px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
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
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <?php $this->load->view('pengguna/sidebar'); ?>
        <div class="main-content">
            <?php $this->load->view('pengguna/navbar'); ?>
            <div class="container">
                <div class="card">
                    <h1>Formulir Pembelian Tiket</h1>
                    <form action="<?php echo base_url('Ctiket/konfirmasi_pemesanan'); ?>" method="post">
                        <input type="hidden" name="id_wisata"
                            value="<?php echo isset($wisata['id_wisata']) ? $wisata['id_wisata'] : ''; ?>">

                        <div class="form-group">
                            <label for="nama_wisata">Nama Wisata:</label>
                            <input type="text" id="nama_wisata" name="nama_wisata"
                                value="<?php echo isset($wisata['nama_wisata']) ? $wisata['nama_wisata'] : ''; ?>"
                                readonly>
                        </div>

                        <div class="form-group">
                            <label for="harga_tiket">Harga Tiket (Rp):</label>
                            <input type="text" id="harga_tiket" name="harga_tiket"
                                value="<?php echo isset($wisata['harga_tiket']) ? number_format($wisata['harga_tiket'], 0, ',', '.') : ''; ?>"
                                readonly>
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
                            <label for="tlp_pemesan">No Telepon Pemesan:</label>
                            <input type="tel" id="tlp_pemesan" name="tlp_pemesan" required>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_tiket">Jumlah Tiket:</label>
                            <input type="number" id="jumlah_tiket" name="jumlah_tiket" required>
                        </div>

                        <div class="form-group">
                            <label for="tgl_kunjungan">Tanggal Kunjungan:</label>
                            <input type="date" id="tgl_kunjungan" name="tgl_kunjungan" required>
                        </div>

                        <div class="form-group button-group">
                            <button type="button" class="btn-back" onclick="history.back()">Kembali</button>
                            <button type="submit" class="btn-submit">Lanjutkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('partials/footer'); ?>
</body>

</html>
