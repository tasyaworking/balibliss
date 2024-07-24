<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Sponsorship</title>
</head>
<body>

<?php if ($this->session->flashdata('message')): ?>
    <p><?php echo $this->session->flashdata('message'); ?></p>
<?php endif; ?>

<?php echo form_open('Sponsorship/submit'); ?>

<p>
    <label for="nama">Nama:</label>
    <input type="text" name="nama" value="<?php echo set_value('nama'); ?>">
    <?php echo form_error('nama'); ?>
</p>

<p>
    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo set_value('email'); ?>">
    <?php echo form_error('email'); ?>
</p>

<p>
    <label for="telepon">Telepon:</label>
    <input type="text" name="telepon" value="<?php echo set_value('telepon'); ?>">
    <?php echo form_error('telepon'); ?>
</p>

<p>
    <label for="perusahaan">Perusahaan:</label>
    <input type="text" name="perusahaan" value="<?php echo set_value('perusahaan'); ?>">
    <?php echo form_error('perusahaan'); ?>
</p>

<p>
    <button type="submit">Daftar</button>
</p>

<?php echo form_close(); ?>

</body>
</html>
