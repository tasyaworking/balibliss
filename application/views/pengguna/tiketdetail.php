<!DOCTYPE html>
<html lang="id">

<head>
	<?php $this->load->view('partials/header'); ?>
	<link rel="stylesheet" href="<?= base_url('assets/css/stylesdetail.css'); ?>">
	<style>
		.page-wrapper {
			display: flex;
			height: 100vh;
			/* Set the height to full viewport height */
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
			padding: 30px;
			height: calc(100vh - 40px);
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
			<div class="container">
				<h2 class="title"><?php echo $tempat['nama']; ?></h2>
				<img class="wisata-img" src="<?php echo base_url('assets/img/wisata/' . $tempat['foto']); ?>"
					alt="<?php echo $tempat['nama']; ?>">

				<div id="overview" class="detail-section">
					<h3 class="section-title">Overview</h3>
					<p class="section-content"><?php echo nl2br($tempat['deskripsi']); ?></p>
				</div>

				<div id="harga" class="detail-section">
					<h3 class="section-title">Harga</h3>
					<p class="section-content"><strong>Rp
							<?php echo number_format($tempat['harga_tiket'], 0, ',', '.'); ?></strong></p>
				</div>

				<div id="lokasi" class="detail-section">
					<h3 class="section-title">Lokasi</h3>
					<p class="section-content"><?php echo $tempat['lokasi']; ?></p>
				</div>

				<div id="jam_operasional" class="detail-section">
					<h3 class="section-title">Jam Operasional</h3>
					<p class="section-content"><?php echo nl2br($tempat['jam_operasional']); ?></p>
				</div>

				<div id="alamat" class="detail-section">
					<h3 class="section-title">Alamat</h3>
					<p class="section-content"><?php echo nl2br($tempat['alamat']); ?></p>
				</div>

				<div id="nomor_telepon" class="detail-section">
					<h3 class="section-title">No. Telp</h3>
					<p class="section-content"><?php echo $tempat['nomor_telepon']; ?></p>
				</div>

				<div id="sosial_media" class="detail-section">
					<h3 class="section-title">Sosial Media</h3>
					<p class="section-content"><?php echo nl2br($tempat['sosial_media']); ?></p>
				</div>

				<a href="<?php echo base_url('Ctiket/pesan/' . $tempat['id']); ?>" class="pesan-button">Pesan Tiket</a>
			</div>
</body>

</html>
