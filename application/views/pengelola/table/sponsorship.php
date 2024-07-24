<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sponsorship</title>
    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
</head>
<body>
    <div class="container">
        <h2>Data Sponsorship</h2>
        
        <?php if ($this->session->flashdata('pesan')): ?>
            <div class="alert alert-<?php echo $this->session->flashdata('color'); ?>">
                <?php echo $this->session->flashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Sponsor</th>
                    <th>Deskripsi</th>
                    <th>Sosial Media</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_sponsor as $sponsor): ?>
                    <tr>
                        <td><?php echo $sponsor['id']; ?></td>
                        <td><?php echo $sponsor['nama_sponsor']; ?></td>
                        <td><?php echo $sponsor['deskripsi']; ?></td>
                        <td><?php echo $sponsor['sosial_media']; ?></td>
                        <td><?php echo $sponsor['alamat']; ?></td>
                        <td><?php echo $sponsor['no_hp']; ?></td>
                        <td>
                            <?php if ($sponsor['logo']): ?>
                                <img src="<?php echo base_url('uploads/'.$sponsor['logo']); ?>" width="100">
                            <?php else: ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td>
                            <!-- Actions: Edit/Delete -->
                            <a href="<?php echo site_url('cpengelola/edit_sponsor/'.$sponsor['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?php echo site_url('cpengelola/delete_sponsor/'.$sponsor['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

   <!-- <?php echo script_tag('assets/js/bootstrap.bundle.min.js'); ?>-->
</body>
</html>
