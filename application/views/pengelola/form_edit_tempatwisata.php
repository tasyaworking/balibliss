<?=$header?>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
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
            <h4 class="mb-4">Edit Tempat Wisata</h4>
            <div class="card">
                <div class="card-body">
                    <form action="<?= site_url('cpengelola/edit/' . ($tempatwisata->id_wisata ?? '')); ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_wisata" class="form-label">Nama Wisata</label>
                            <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" value="<?= htmlspecialchars($tempatwisata->nama_wisata ?? ''); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="sosmed" class="form-label">Sosial Media</label>
                            <input type="text" class="form-control" id="sosmed" name="sosmed" value="<?= htmlspecialchars($tempatwisata->sosmed ?? ''); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jam_operasional" class="form-label">Jam Operasional</label>
                            <input type="text" class="form-control" id="jam_operasional" name="jam_operasional" value="<?= htmlspecialchars($tempatwisata->jam_operasional ?? ''); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                            <?php if (!empty($tempatwisata->gambar)): ?>
                            <img src="<?= base_url('uploads/' . $tempatwisata->gambar); ?>" alt="Gambar" width="100" class="mt-2">
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_wisata" class="form-label">Alamat Wisata</label>
                            <input type="text" class="form-control" id="alamat_wisata" name="alamat_wisata" value="<?= htmlspecialchars($tempatwisata->alamat_wisata ?? ''); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="no_hp_wisata" class="form-label">No Telp</label>
                            <input type="text" class="form-control" id="no_hp_wisata" name="no_hp_wisata" value="<?= htmlspecialchars($tempatwisata->no_hp_wisata ?? ''); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi"><?= htmlspecialchars($tempatwisata->deskripsi ?? ''); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= site_url('cpengelola'); ?>" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$footer?>