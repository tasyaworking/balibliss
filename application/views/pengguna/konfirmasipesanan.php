<!DOCTYPE html>
<html lang="id">

<head>
	<?php $this->load->view('partials/header'); ?>
	<link rel="stylesheet" href="<?= base_url('assets/css/styleskonfirm.css'); ?>">
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
			background-color: white;
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
			background-color: #4CAF50;
			color: white;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			cursor: pointer;
			margin-right: 10px;
		}

		.btn-back:hover {
			background-color: #45a049;
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
