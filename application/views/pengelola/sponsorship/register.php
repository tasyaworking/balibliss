<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Sponsorship</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h4 class="my-4">Register Sponsorship</h4>
        
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

        <form action="<?= site_url('csponsorship/submit'); ?>" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" required>
            </div>
            <div class="mb-3">
                <label for="perusahaan" class="form-label">Perusahaan</label>
                <input type="text" class="form-control" id="perusahaan" name="perusahaan" required>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
    <script src="<?= base_url(); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
