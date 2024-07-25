<!DOCTYPE html>
<html lang="id">

<head>
	<?php $this->load->view('partials/header'); ?>
	<link rel="stylesheet" href="<?= base_url('assets/css/styleskonfirm.css'); ?>">
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
    margin-top: 90px; /* Adjust margin to push content below navbar */
    margin-left: 90px; /* Adjust margin to make space for sidebar */
    overflow-y: auto; /* Enable vertical scrolling */
    padding: 20px;
    height: calc(100vh - 40px); /* Full height minus navbar height */
}

.container {
    margin-top: 20px;
}

.card {
    padding: 100px; /* Increased padding */
    background: #fff;
    border-radius: 50px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 800px; /* Set a max-width to limit the card's size */
    margin: 0 auto; /* Center the card horizontally */
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
    font-size: 16px;
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
			<div class="main-container">
				<div class="container">
					<div class="card">
						<h1>Konfirmasi Pemesanan</h1>
						<?php if (isset($konfirmasi)) { ?>
						<p>Nama Pemesan: <?php echo $konfirmasi['nama_pemesan']; ?></p>
						<p>Jenis Kelamin: <?php echo $konfirmasi['jenis_kelamin']; ?></p>
						<p>Jumlah Tiket: <?php echo $konfirmasi['jumlah_tiket']; ?></p>
						<p>Tanggal Kunjungan: <?php echo $konfirmasi['tgl_kunjungan']; ?></p>
						<p>Total Harga: Rp
							<?php echo isset($konfirmasi['total_harga']) ? number_format($konfirmasi['total_harga'], 0, ',', '.') : ''; ?>
						</p>
						<?php } else { ?>
						<p>Data pemesanan tidak ditemukan.</p>
						<?php } ?>
						<div class="form-group">
							<a href="<?php echo base_url('Ctiket/lakukan_pembayaran'); ?>" class="button">Lanjutkan
								Pembayaran</a>
							<button type="button" class="btn-back" onclick="history.back()">Batal</button>
						</div>
						<div class="card note">
							<h2>Catatan Penting</h2>
							<p>Tiket tidak bisa refund.</p>
							<p>Tiket hanya berlaku di tanggal yang terpilih.</p>
							<p>Konfirmasi instan.</p>
						</div>
					</div>
</body>

</html>
