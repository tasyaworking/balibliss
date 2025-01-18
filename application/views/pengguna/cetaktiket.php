<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/stylesform.css'); ?>">
<?php $this->load->view('pengguna/navbar'); ?>
<?php $this->load->view('pengguna/sidebar'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Tiket</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Cetak Tiket</h1>
            <p>Nama Wisata: <?php echo isset($nama_wisata) ? $nama_wisata : 'Data tidak tersedia'; ?></p>
            <p>Id Pesanan: <?php echo isset($id_pesanan) ? $id_pesanan : 'Data tidak tersedia'; ?></p>
            <p>Harga Tiket: Rp. <?php echo isset($harga_tiket) ? number_format($harga_tiket, 0, ',', '.') : 'Data tidak tersedia'; ?></p>
            <p>Tanggal Kunjungan: <?php echo isset($tgl_kunjungan) ? $tgl_kunjungan : 'Data tidak tersedia'; ?></p>
            <a href="<?php echo base_url(); ?>">Kembali ke Beranda</a>
            <br><br>
            <input type="button" class="btn btn-success" value="Cetak PDF" onclick="cetakpdf()">
        </div>
    </div>
</body>
<script language="javascript">
	function cetakpdf()
	{
		window.open("<?php echo base_url() ?>ctiket/cetakpdf","_blank");	
	}
  </script>
  
</html>