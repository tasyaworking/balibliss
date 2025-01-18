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

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Perusahaan</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sponsorships as $sponsor): ?>
                    <tr>
                        <td><?= $sponsor->id; ?></td>
                        <td><?= htmlspecialchars($sponsor->nama); ?></td>
                        <td><?= htmlspecialchars($sponsor->email); ?></td>
                        <td><?= htmlspecialchars($sponsor->telepon); ?></td>
                        <td><?= htmlspecialchars($sponsor->perusahaan); ?></td>
                        <td><?= htmlspecialchars($sponsor->created_at); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
