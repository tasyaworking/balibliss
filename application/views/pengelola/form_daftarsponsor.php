<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sponsorship</title>
    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
</head>
<body>
    <div class="container">
        <?php if ($this->session->flashdata('pesan')): ?>
            <div class="alert alert-<?php echo $this->session->flashdata('color'); ?>">
                <?php echo $this->session->flashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <h2>Daftar Sponsorship</h2>
        <?php echo form_open_multipart('cpengelola/daftarsponsor'); ?>
        
        <div class="form-group">
            <?php echo form_label('Nama Sponsor', 'nama_sponsor'); ?>
            <?php echo form_input('nama_sponsor', set_value('nama_sponsor'), ['class' => 'form-control', 'id' => 'nama_sponsor']); ?>
        </div>

        <div class="form-group">
            <?php echo form_label('Deskripsi Sponsor', 'deskripsi'); ?>
            <?php echo form_textarea('deskripsi', set_value('deskripsi'), ['class' => 'form-control', 'id' => 'deskripsi']); ?>
        </div>

        <div class="form-group">
            <?php echo form_label('Sosial Media', 'sosial_media'); ?>
            <?php echo form_input('sosial_media', set_value('sosial_media'), ['class' => 'form-control', 'id' => 'sosial_media']); ?>
        </div>

        <div class="form-group">
            <?php echo form_label('Alamat', 'alamat'); ?>
            <?php echo form_input('alamat', set_value('alamat'), ['class' => 'form-control', 'id' => 'alamat']); ?>
        </div>

        <div class="form-group">
            <?php echo form_label('No HP', 'no_hp'); ?>
            <?php echo form_input('no_hp', set_value('no_hp'), ['class' => 'form-control', 'id' => 'no_hp']); ?>
        </div>

        <div class="form-group">
            <?php echo form_label('Logo Sponsor', 'gambar'); ?>
            <?php echo form_upload('gambar', '', ['class' => 'form-control', 'id' => 'gambar']); ?>
        </div>

        <button type="submit" class="btn btn-primary">Daftar</button>
        <?php echo form_close(); ?>
    </div>

   <!-- <?php echo script_tag('assets/js/bootstrap.bundle.min.js'); ?>-->
</body>
</html>
