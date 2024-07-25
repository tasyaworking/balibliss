<!DOCTYPE html>
<html lang="id">

<head>
	<?php $this->load->view('partials/header'); ?>
	<link rel="stylesheet" href="<?= base_url('assets/css/styles.pembayaran.css'); ?>">
	<style>
		.page-wrapper {
			display: flex;
			height: 100vh;
			overflow: hidden;
			/* Ensure no scrolling on the main wrapper */
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
			margin-top: 70px;
			/* Adjust margin to push content below navbar */
			margin-left: 250px;
			/* Adjust margin to make space for sidebar */
			overflow-y: auto;
			/* Enable vertical scrolling */
			padding: 20px;
			height: calc(100vh - 70px);
			/* Full height minus navbar height */
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
</head>

<body>
	<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
		data-sidebar-position="fixed" data-header-position="fixed">
		<?php $this->load->view('pengguna/sidebar'); ?>
		<div class="main-content">
			<?php $this->load->view('pengguna/navbar'); ?>
			<div class="main-container">
				<div class="container">
					<h1>Pembayaran</h1>

					<!-- Card untuk menampilkan informasi nama wisata dan total harga -->
					<div class="card">
						<p>Nama Wisata:
							<?php echo isset($wisata['nama_wisata']) ? $wisata['nama_wisata'] : 'Nama Wisata Tidak Tersedia'; ?>
						</p>
						<p>Total Harga:
							<?php echo isset($total_harga) ? 'Rp ' . number_format($total_harga, 0, ',', '.') : 'Total Harga Tidak Tersedia'; ?>
						</p>
						<p>Mohon Transfer ke :
							<?php echo isset($no_rek) ? 'Rp ' . number_format($no_rek, 0, ',', '.') : 'No rekening Tidak Tersedia'; ?>
						</p>
					</div>
					<!-- Form untuk upload bukti transaksi -->
					<?php echo form_open_multipart('Ctiket/insertkonfirmasi'); ?>
					<input type="hidden" name="total_harga"
						value="<?php echo isset($total_harga) ? $total_harga : ''; ?>">
					<input type="hidden" name="id_wisata"
						value="<?php echo isset($wisata['id_wisata']) ? $wisata['id_wisata'] : ''; ?>">

					<div class="card">
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
					</div>

					<div class="button-container">
						<button type="submit">Kirim</button>
						<button type="button" class="btn-back" onclick="history.back()">Batal</button>
					</div>
					<?php echo form_close(); ?>
					<?php echo validation_errors('<div class="error-message">', '</div>'); ?>
				</div>
</body>

</html>
