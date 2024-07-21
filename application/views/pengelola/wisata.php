<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tempat Wisata</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
</head>
<body>
    <?php echo $header; ?>
    <div class="container-fluid">
        <div class="row">
            <?php echo $sidebar; ?>
            <div class="col-md-10">
                <?php echo $navbar; ?>
                <div class="container mt-4">
                    <?php if ($this->session->flashdata('pesan')) : ?>
                        <div class="alert alert-<?php echo $this->session->flashdata('color'); ?>">
                            <?php echo $this->session->flashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-header">
                            <h3>Tambah Tempat Wisata</h3>
                        </div>
                        <div class="card-body">
                            <?php echo form_open_multipart('cpengelola/tambahTempatWisata'); ?>
                                <div class="form-group">
                                    <label for="nama_wisata">Nama Wisata</label>
                                    <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" value="<?php echo set_value('nama_wisata'); ?>">
                                    <?php echo form_error('nama_wisata', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo set_value('deskripsi'); ?></textarea>
                                    <?php echo form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jam_operasional">Jam Operasional</label>
                                    <input type="text" class="form-control" id="jam_operasional" name="jam_operasional" value="<?php echo set_value('jam_operasional'); ?>">
                                    <?php echo form_error('jam_operasional', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="fasilitas">Fasilitas</label>
                                    <textarea class="form-control" id="fasilitas" name="fasilitas"><?php echo set_value('fasilitas'); ?></textarea>
                                    <?php echo form_error('fasilitas', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="sosial_media">Sosial Media</label>
                                    <input type="text" class="form-control" id="sosial_media" name="sosial_media" value="<?php echo set_value('sosial_media'); ?>">
                                    <?php echo form_error('sosial_media', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                                    <?php echo form_error('gambar', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat"><?php echo set_value('alamat'); ?></textarea>
                                    <?php echo form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo set_value('no_hp'); ?>">
                                    <?php echo form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="harga_tiket">Harga Tiket</label>
                                    <input type="text" class="form-control" id="harga_tiket" name="harga_tiket" value="<?php echo set_value('harga_tiket'); ?>">
                                    <?php echo form_error('harga_tiket', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Tempat Wisata</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <?php echo $footer; ?>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
