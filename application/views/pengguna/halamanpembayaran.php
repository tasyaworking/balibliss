<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('partials/header'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.pembayaran.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Style untuk wrapper halaman */
/* Style untuk wrapper halaman */
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
    background-color: #007bff;
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
    text-align: center;
    background: linear-gradient(to right, #e0f7fa, #ffffff); /* Warna gradient dari biru muda ke putih */
    font-weight: bold;
    
}

.container {
    margin-top: 20px;
}

.card {
    padding: 30px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 25000px;
    margin: 0 auto;
    position: relative;
    text-align: center;
    font-weight: bold;
}

.card h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.card p {
    font-size: 18px;
    margin-bottom: 10px;
}

/* Style untuk icon */
.card-icon {
    width: 50px;
    height: 50px;
    position: absolute;
    top: -25px;
    left: calc(50% - 25px);
    background-color: #007bff;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.card-icon i {
    color: white;
    font-size: 24px;
}

/* Style untuk form-group */
.form-group {
    margin-bottom: 20px;
    text-align: left;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 12px;
    border: 1px solid #007bff;
    border-radius: 5px;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group select:focus {
    border-color: #0056b3;
    outline: none;
}

/* Style untuk dropdown */
.form-group select {
    background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMiIgaGVpZ2h0PSIxMiIgZmlsbD0ibm9uZSIgdmlld0JveD0iMCAwIDEyIDEyIj48cGF0aCBkPSJNMS40MTQgNC4xNDRhLjY5LjY5IDAgMDEuOTc2IDBMNiA3LjIwNyA5LjYxMiA0LjE0NGEuNjkuNjkgMCAwMS45NzYgMGwuNTk1LjU5NWEuNjkuNjkgMCAwMSAwIC45NzZMMTYuNTkgOS4xMjZsLS41OTUuNTk1YS42OS42OSAwIDAxLS45NzYgMGwtNS45NTItNS45NTJhLjY5LjY5IDAgMDAtLjk3NiAwTDEuNDE0IDQuNzMyYS42OS42OSAwIDAxMC0uOTc2eiIgZmlsbD0iI0FBQUIiLz48L3N2Zz4=');
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 12px;
    padding-right: 40px;
}

/* Style untuk tombol */
.btn-submit,
.btn-back {
    border: none;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease;
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

/* Style untuk pesan error */
.error-message {
    color: red;
    margin-top: 10px;
    font-size: 14px;
}

/* Style untuk instruksi pembayaran */
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
    <!-- Memasukkan ikon FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM1k6oU9R2voT+L3n4JvlV0V7Aj0B+0+6LvQ5X9" crossorigin="anonymous">
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <?php $this->load->view('pengguna/sidebar'); ?>
        <div class="main-content">
            <?php $this->load->view('pengguna/navbar'); ?>
            <div class="main-container">
                <div class="container">
                    <!-- Card untuk menampilkan informasi nama wisata dan total harga -->
                    <div class="card">
                    <h1>Pembayaran</h1>
                        <p>Nama Wisata:
                            <?php echo isset($wisata['nama_wisata']) ? $wisata['nama_wisata'] : 'Nama Wisata Tidak Tersedia'; ?>
                        </p>
                        <p>Total Harga:
                            <?php echo isset($total_harga) ? 'Rp ' . number_format($total_harga, 0, ',', '.') : 'Total Harga Tidak Tersedia'; ?>
                        </p>
                        <p>Mohon Transfer ke:
                            <?php echo isset($no_rek) ? $no_rek : 'No rekening Tidak Tersedia'; ?>
                        </p>

                        <!-- Form untuk upload bukti transaksi -->
                        <?php echo form_open_multipart('Ctiket/insertkonfirmasi'); ?>
                        <input type="hidden" name="total_harga" value="<?php echo isset($total_harga) ? $total_harga : ''; ?>">
                        <input type="hidden" name="id_wisata" value="<?php echo isset($wisata['id_wisata']) ? $wisata['id_wisata'] : ''; ?>">
                        <input type="hidden" name="no_rek" value="<?php echo isset($no_rek) ? $no_rek : ''; ?>">

                        <div class="form-group">
                            <label for="bank_km">Bank Tujuan:</label>
                            <select name="bank_km" id="bank_km" required>
                                <option value="" disabled selected>Pilih Bank Tujuan</option>
                                <option value="BCA">BCA</option>
                                <option value="BNI">BNI</option>
                                <option value="BRI">BRI</option>
                                <option value="Mandiri">Mandiri</option>
                                <!-- Tambahkan opsi bank lainnya sesuai kebutuhan -->
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nomrek">Nomor Rekening:</label>
                            <input type="text" name="nomrek" id="nomrek" required>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Pemilik Rekening:</label>
                            <input type="text" name="nama" id="nama" required>
                        </div>

                        <div class="form-group">
                            <label for="tgl_kunjungan">Tanggal Kunjungan:</label>
                            <input type="date" name="tgl_kunjungan" id="tgl_kunjungan" required>
                        </div>

                        <div class="form-group">
                            <label for="userfile">Upload Bukti Transaksi:</label>
                            <input type="file" name="userfile" id="userfile" required>
                        </div>
                        <div class="button-container">
                            <button type="submit" class="btn-submit">Kirim</button>
                            <button type="button" class="btn-back" onclick="history.back()">Batal</button>
                        </div>
                        <?php echo form_close(); ?>

                        <?php echo validation_errors('<div class="error-message">', '</div>'); ?>
                        <?php if (isset($error)) { echo '<div class="error-message">' . $error . '</div>'; } ?>

                        <div class="instructions">
                        <h3>Instruksi Pembayaran:</h3>
                        <ul>
                            <li><strong>1. Transfer ke Nomor Rekening:</strong> 
                                <?php echo isset($no_rek) ? $no_rek : 'Nomor Rekening Tidak Tersedia'; ?>
                            </li>
                            <li><strong>2. Jumlah Transfer:</strong> 
                                <?php echo isset($total_harga) ? 'Rp ' . number_format($total_harga, 0, ',', '.') : 'Total Harga Tidak Tersedia'; ?>
                            </li>
                            <li><strong>3. Bank Tujuan:</strong> Pilih bank tujuan yang sesuai dengan rekening Anda.</li>
                            <li><strong>4. Nomor Rekening:</strong> Masukkan nomor rekening Anda untuk verifikasi.</li>
                            <li><strong>5. Nama Pemilik Rekening:</strong> Masukkan nama pemilik rekening sesuai dengan yang tertera di buku rekening.</li>
                            <li><strong>6. Upload Bukti Transfer:</strong> Setelah melakukan transfer, upload bukti transfer untuk verifikasi pembayaran.</li>
                            <li><strong>7. Konfirmasi Pembayaran:</strong> Klik tombol submit untuk mengirimkan data pembayaran Anda.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
