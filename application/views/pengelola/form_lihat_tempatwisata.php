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
            
            <?php
            if (!empty($konten) || !empty($table)) {
                if (!empty($konten)) {
                    echo $konten;
                }
                if (!empty($table)) {
                    echo $table;
                }
            } else {
            ?>
            <h4 class="mb-4">Detail Data Tempat Wisata</h4>
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="<?= site_url('cpengelola/tempatwisata'); ?>" class="btn btn-danger">Kembali</a>
                </div>
                <div class="card-body">
                    <?php if (!empty($data_tempatwisata)): ?>
                        <?php foreach ($data_tempatwisata as $row): ?>
                            <div class="mb-3">
                                <h5>Nama Destinasi:</h5>
                                <p><?= htmlspecialchars($row->nama_wisata) ?></p>
                            </div>
                            <div class="mb-3">
                                <h5>Sosial Media:</h5>
                                <p><?= htmlspecialchars($row->sosmed) ?></p>
                            </div>
                            <div class="mb-3">
                                <h5>Jam Operasional:</h5>
                                <p><?= htmlspecialchars($row->jam_operasional) ?></p>
                            </div>
                            <div class="mb-3">
                                <h5>Foto:</h5>
                                <img src="<?= base_url('uploads/' . $row->foto) ?>" alt="Gambar" width="100">
                            </div>
                            <div class="mb-3">
                                <h5>Alamat Lengkap Wisata:</h5>
                                <p><?= htmlspecialchars($row->alamat_wisata) ?></p>
                            </div>
                            <div class="mb-3">
                                <h5>Lokasi Wisata:</h5>
                                <p><?= htmlspecialchars($row->lokasi) ?></p>
                            </div>
                            <div class="mb-3">
                                <h5>No Telp:</h5>
                                <p><?= htmlspecialchars($row->no_hp_wisata) ?></p>
                            </div>
                            <div class="mb-3">
                                <h5>No Rekening:</h5>
                                <p><?= htmlspecialchars($row->no_rek) ?></p>
                            </div>
                            <div class="mb-3">
                                <h5>Harga Tiket:</h5>
                                <p><?= htmlspecialchars($row->harga_tiket) ?></p>
                            </div>
                            <div class="mb-3">
                                <h5>Deskripsi Singkat:</h5>
                                <p><?= htmlspecialchars($row->deskripsi_singkat) ?></p>
                            </div>
                            <div class="mb-3">
                                <h5>Detail Deskripsi:</h5>
                                <p><?= htmlspecialchars($row->deskripsi) ?></p>
                            </div>
                            <hr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center">Data tidak ditemukan.</p>
                    <?php endif; ?>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Main -->
</div>
<?=$footer?>
