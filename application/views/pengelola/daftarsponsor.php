<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Sponsorship</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .body-wrapper {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <?=$header?>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
         data-sidebar-position="fixed" data-header-position="fixed">
        <?=$sidebar;?>
        <!-- Main wrapper -->
        <div class="body-wrapper">
            <?=$navbar?>
            <!-- main -->
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
                    <h3>Form Pendaftaran Sponsorship</h3>
                    <?=form_open_multipart('Cpengelola/daftarsponsor'); ?>
                    <div class="mb-3">
                        <label for="nama_wisata" class="form-label">Nama Sponsor</label>
                        <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Sponsor</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="sosial_media" class="form-label">Sosial Media</label>
                        <input type="text" class="form-control" id="sosial_media" name="sosial_media" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Logo (jpg, png, jpeg)</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg, .png, .jpeg" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat </label>
                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Bukti Pembayaran (jpg, png, jpeg)</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept=".jpg, .png, .jpeg" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                    <?=form_close(); ?>
                </div>
            </div>
        </div>
        <!-- main -->
    </div>
    <?=$footer?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
