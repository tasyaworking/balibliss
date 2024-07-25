<?=$header?>
<!-- Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <?=$sidebar;?>
    <!-- Main wrapper -->
    <div class="body-wrapper">
        <?=$navbar?>
        <!-- Main content -->
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
            
            <h4 class="mb-4">Tambah Tempat Wisata</h4>
            <div class="card">
                <div class="card-body">
                    <form action="<?= site_url('Cpengelola/add'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <div class="mb-3">
                            <label for="nama_wisata" class="form-label">Nama Wisata</label>
                            <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" required>
                        </div>
                        <div class="mb-3">
                            <label for="sosmed" class="form-label">Sosial Media</label>
                            <input type="text" class="form-control" id="sosmed" name="sosmed">
                        </div>
                        <div class="mb-3">
                            <label for="jam_operasional" class="form-label">Jam Operasional</label>
                            <input type="text" class="form-control" id="jam_operasional" name="jam_operasional">
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <div class="mb-3">
                            <label for="alamat_wisata" class="form-label">Alamat Lengkap Wisata</label>
                            <input type="text" class="form-control" id="alamat_wisata" name="alamat_wisata">
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi Wisata</label>
                            <textarea class="form-control" id="lokasi" name="lokasi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp_wisata" class="form-label">No Telp</label>
                            <input type="text" class="form-control" id="no_hp_wisata" name="no_hp_wisata">
                        </div>
                        <div class="mb-3">
                            <label for="no_rek" class="form-label">No Rekening</label>
                            <input type="text" class="form-control" id="no_rek" name="no_rek">
                        </div>
                        <div class="mb-3">
                            <label for="harga_tiket" class="form-label">Harga Tiket</label>
                            <input type="text" class="form-control" id="harga_tiket" name="harga_tiket">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_singkat" class="form-label">Deskripsi Singkat</label>
                            <textarea class="form-control" id="deskripsi_singkat" name="deskripsi_singkat"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Detail Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= site_url('Cpengelola'); ?>" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Main -->
</div>
<?=$footer?>
