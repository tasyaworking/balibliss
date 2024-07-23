<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2><?= $title; ?></h2>

        <?php if ($this->session->flashdata('pesan')): ?>
            <div class="alert alert-<?= $this->session->flashdata('color'); ?>">
                <?= $this->session->flashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <?= form_open('csponsorship/tambah'); ?>
            <div class="form-group">
                <?= form_label('Nama Sponsor', 'nama'); ?>
                <?= form_input('nama', set_value('nama'), ['class' => 'form-control']); ?>
            </div>
            <div class="form-group">
                <?= form_label('Email', 'email'); ?>
                <?= form_input('email', set_value('email'), ['class' => 'form-control']); ?>
            </div>
            <div class="form-group">
                <?= form_label('Telepon', 'telepon'); ?>
                <?= form_input('telepon', set_value('telepon'), ['class' => 'form-control']); ?>
            </div>
            <div class="form-group">
                <?= form_label('Perusahaan', 'perusahaan'); ?>
                <?= form_input('perusahaan', set_value('perusahaan'), ['class' => 'form-control']); ?>
            </div>
            <?= form_submit('submit', 'Daftar', ['class' => 'btn btn-primary']); ?>
        <?= form_close(); ?>
    </div>
</body>
</html>
