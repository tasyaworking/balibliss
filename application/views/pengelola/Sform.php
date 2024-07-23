<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Sponsorship</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Form Pendaftaran Sponsorship</h2>
        
        <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-info">
                <?= $this->session->flashdata('message') ?>
            </div>
        <?php endif; ?>
        
        <?= form_open('sponsorship/submit') ?>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama') ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="<?= set_value('telepon') ?>">
                <?= form_error('telepon', '<small class="text-danger">', '</small>') ?>
            </div>
            <div class="mb-3">
                <label for="perusahaan" class="form-label">Perusahaan</label>
                <input type="text" class="form-control" id="perusahaan" name="perusahaan" value="<?= set_value('perusahaan') ?>">
                <?= form_error('perusahaan', '<small class="text-danger">', '</small>') ?>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        <?= form_close() ?>
    </div>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
