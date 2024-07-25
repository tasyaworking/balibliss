<!DOCTYPE html>
<html lang="id">

<head>
	<?php $this->load->view('partials/header'); ?>
	<link rel="stylesheet" href="<?= base_url('assets/css/stylesdashboard.css'); ?>">
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
			background-color: #fff;
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
			padding: 10px;
			height: calc(100vh - 90px);
			/* Full height minus navbar height */
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
			<div class="content-container">
				<div class="wisata-container">
					<?php if (!empty($wisata)): ?>
					<?php foreach ($wisata as $tempat): ?>
					<div class="wisata-card">
						<img src="<?= base_url('uploads/' . $tempat['foto']); ?>"
							alt="<?= $tempat['nama_wisata']; ?>" class="wisata-img">
						<h3><?= $tempat['nama_wisata']; ?></h3>
						<p class="wisata-description"><?= $tempat['deskripsi_singkat']; ?></p>
						<p class="wisata-price">Harga: Rp <?= number_format($tempat['harga_tiket'], 0, ',', '.'); ?></p>
						<p class="wisata-location">Lokasi: <?= $tempat['lokasi']; ?></p>
						<a href="<?= base_url('Ctiket/detailwisata/' . $tempat['id_wisata']); ?>"
							class="pesan-button">Beli Sekarang</a>
					</div>
					<?php endforeach; ?>
					<?php else: ?>
					<p>Maaf, tidak ada data wisata yang tersedia saat ini.</p>
					<?php endif; ?>
				</div>
				<?php $this->load->view('partials/footer'); ?>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>
