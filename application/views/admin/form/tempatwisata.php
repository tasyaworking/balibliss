<div class="container-fluid">
    
    <h3 class="title"><?= $data_tempat_wisata_by_id->nama_wisata ?></h3>
		<img class="wisata-img" src="<?php echo base_url('uploads/' . $data_tempat_wisata_by_id->foto);?>"
			width="45%" alt="<?= $data_tempat_wisata_by_id->nama_wisata ?>">

	<div id="overview" class="detail-section">
		<h5 class="section-title">Overview</h5>
			<p class="section-content"><?php echo nl2br($data_tempat_wisata_by_id->deskripsi); ?></p>
	</div>

	<!-- <div id="fasilitas" class="detail-section">
		<h5 class="section-title">Fasilitas</h5>
			<p class="section-content"><?= $data_tempat_wisata_by_id->fasilitas ?></p>
	</div> -->

	<div id="alamat" class="detail-section">
		<h5 class="section-title">Alamat</h5>
		    <p class="section-content"><?= $data_tempat_wisata_by_id->alamat_wisata ?></p>
	</div>

	<div id="lokasi" class="detail-section">
		<h5 class="section-title">Lokasi</h5>
		    <p class="section-content"><?= $data_tempat_wisata_by_id->lokasi ?></p>
	</div>

	<div id="jam_operasional" class="detail-section">
		<h5 class="section-title">Jam Operasional</h5>
			<p class="section-content"><?= $data_tempat_wisata_by_id->jam_operasional ?></p>
	</div>

	<div id="nomor_telepon" class="detail-section">
		<h5 class="section-title">No. Telp</h5>
		<p class="section-content"><?= $data_tempat_wisata_by_id->no_hp_wisata ?></p>
	</div>

	<div id="rekening" class="detail-section">
		<h5 class="section-title">No. Rekening </h5>
		<p class="section-content"><?= $data_tempat_wisata_by_id->no_rek ?></p>
	</div>

	<div id="harga_tiket" class="detail-section">
		<h5 class="section-title">Harga Tiket</h5>
		<p class="section-content">Rp<?= number_format($data_tempat_wisata_by_id->harga_tiket, 0, ',', '.') ?></p>
	</div>

	<div id="sosial_media" class="detail-section">
		<h5 class="section-title">Sosial Media</h5>
		<p class="section-content"><?= $data_tempat_wisata_by_id->sosmed ?></p>
    </div>	

    <div id="pengelola" class="detail-section">
		<h4 class="section-title">Tentang Pengelola</h4>
		Nama Pengelola: <?= $data_tempat_wisata_by_id->nama ?> <br/>
        Email: <?= $data_tempat_wisata_by_id->email ?> <br/>
        No. Telp: <?= $data_tempat_wisata_by_id->no_hp ?>
    </div>	
   
</div>
