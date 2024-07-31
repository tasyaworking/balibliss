<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('partials/header'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/stylesform.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
.page-wrapper {
    display: flex;
    height: 100vh; /* Set the height to full viewport height */
    overflow: hidden; /* Ensure no scrolling on the main wrapper */
    background: linear-gradient(to right, #e0f7ff, #ffffff); /* Warna gradient dari biru muda ke putih */
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
    background-color: #FFF;
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
    margin-top: 60px; /* Adjust margin to push content below navbar */
    margin-left: 190px; /* Adjust margin to make space for sidebar */
    overflow-y: auto; /* Enable vertical scrolling */
    padding: 20px;
    height: calc(100vh - 90px); /* Full height minus navbar height */
    background: linear-gradient(to right, #e0f7ff, #ffffff);  /* Warna gradient dari biru muda ke putih */
    
}

.container {
    margin-top: 20px;
}

.card {
    padding: 40px; /* Adjust padding as needed */
    background: #fff;
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 30000px; /* Set a max-width to limit the card's size */
    margin: 0 auto; /* Center the card horizontally */
    transition: box-shadow 0.3s ease; /* Smooth transition for shadow only */
}

.card:hover {
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Increased shadow on hover */
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    font-size: 18px;
}

.form-group select {
    appearance: none; /* Remove default dropdown icon */
    background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMiIgaGVpZ2h0PSIxMiIgZmlsbD0ibm9uZSIgdmlld0JveD0iMCAwIDEyIDEyIj48cGF0aCBkPSJNMS40MTQgNC4xNDRhLjY5LjY5IDAgMDEuOTc2IDBMNiA3LjIwNyA5LjYxMiA0LjE0NGEuNjkuNjkgMCAwMS45NzYgMGwuNTk1LjU5NWEuNjkuNjkgMCAwMSAwIC45NzZMMTYuNTkgOS4xMjZsLS41OTUuNTk1YS42OS42OSAwIDAxLS45NzYgMGwtNS45NTItNS45NTJhLjY5LjY5IDAgMDAtLjk3NiAwTDEuNDE0IDQuNzMyYS42OS42OSAwIDAxMC0uOTc2eiIgZmlsbD0iI0FBQUIiLz48L3N2Zz4=');
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 12px;
    padding-right: 40px; /* Adjust padding to accommodate dropdown icon */
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

.btn-back {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-back:hover {
    background-color: #45a049;
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
                        <input type="hidden" name="id_wisata" value="<?php echo isset($wisata['id_wisata']) ? $wisata['id_wisata'] : ''; ?>">
                        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>">

                        <div class="form-group">
                            <label for="nama_wisata">Nama Wisata:</label>
                            <input type="text" id="nama_wisata" name="nama_wisata" value="<?php echo isset($wisata['nama_wisata']) ? $wisata['nama_wisata'] : ''; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="harga_tiket">Harga Tiket (Rp):</label>
                            <input type="text" id="harga_tiket" name="harga_tiket" value="<?php echo isset($wisata['harga_tiket']) ? number_format($wisata['harga_tiket'], 0, ',', '.') : ''; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_pemesan">Nama Lengkap:</label>
                            <input type="text" id="nama_pemesan" name="nama_pemesan" required>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
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
