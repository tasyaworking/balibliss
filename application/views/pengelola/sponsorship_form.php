<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Sponsorship</title>
</head>
<body>
    <h1>Form Pendaftaran Sponsorship</h1>
    <?php if ($this->session->flashdata('success')): ?>
        <p style="color:green;"><?php echo $this->session->flashdata('success'); ?></p>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <p style="color:red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('sponsorship/register'); ?>
        <p>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" value="<?php echo set_value('nama'); ?>">
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo set_value('email'); ?>">
        </p>
        <p>
            <label for="telepon">Telepon:</label>
            <input type="text" name="telepon" value="<?php echo set_value('telepon'); ?>">
        </p>
        <p>
            <label for="perusahaan">Perusahaan:</label>
            <input type="text" name="perusahaan" value="<?php echo set_value('perusahaan'); ?>">
        </p>
        <p>
            <input type="submit" value="Daftar">
        </p>
    <?php echo form_close(); ?>
</body>
</html>
