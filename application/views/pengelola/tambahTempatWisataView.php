<?=$header?>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <?=$sidebar;?>
    <div class="body-wrapper">
        <?=$navbar?>
        <div class="container-fluid">
            <?php
            $pesan = $this->session->flashdata('pesan');
            $color = $this->session->flashdata('color');
            if (!empty($pesan)):
                ?>
                <div class="alert alert-<?=$color?> alert-dismissible fade show" role="alert">
                    <?=$pesan?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            endif;
            ?>

            <div class="p-3 rounded-4 bg-primary bg-opacity-50">
                <h3>Form Pendaftaran Tempat Wisata</h3>
                <?=form_open_multipart('Cpengelola/tambahTempatWisata'); ?>
                <div class="mb-3">
                    <label for="nama_wisata" class="form-label">Nama Wisata</label>
                    <input type="text" class="form-control" id="nama" name="nama_wisata" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="jam_buka" class="form-label">Jam Operasional Wisata</label>
                    <input type="time" class="form-control" id="jam_operasional" name="jam_buka" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Wisata</label>
                    <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="sosial_media" class="form-label">Sosial Media</label>
                    <input type="text" class="form-control" id="sosial_media" name="sosial_media" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar (jpg, png, jpeg)</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg, .png, .jpeg" required>
                </div>
                <div class="mb-3">
                    <label for="nomor_telepon" class="form-label">No Telp</label>
                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
                </div>
                <div class="mb-3">
                    <label for="harga_tiket" class="form-label">Harga Tiket</label>
                    <input type="text" class="form-control" id="harga_tiket" name="harga_tiket" required>
                </div>
                <button type="submit" class="btn btn-primary">Daftar</button>
                <?=form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?=$footer?>
