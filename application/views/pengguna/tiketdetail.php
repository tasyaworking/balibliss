<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tiket Wisata</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
            font-size: 2em;
            font-weight: 700;
        }

        img {
            display: block;
            margin: 0 auto 20px; /* Center the image and add bottom margin */
            max-width: 100%; /* Make image responsive */
            height: auto; /* Keep aspect ratio */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .detail-content {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: 500;
            font-size: 1.1em;
            color: #333;
            margin-bottom: 5px;
        }

        .form-group p {
            font-size: 1.1em;
            line-height: 1.6;
            margin: 0;
            white-space: pre-wrap; /* Preserve spaces and line breaks */
        }

        .description p {
            text-align: justify; /* Justify text for description */
        }

        .pesan-button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
            font-size: 1.2em;
            font-weight: 500;
        }

        .pesan-button:hover {
            background-color: #45a049;
        }

        .article-section {
            margin-top: 20px;
        }

        .article-section h3 {
            font-size: 1.4em;
            margin-bottom: 10px;
            color: #444;
        }

        .article-section p {
            margin-bottom: 10px;
            font-size: 1em;
            line-height: 1.6;
        }
    </style>
</head>
<body>
<?php $this->load->view('partials/navbar'); ?>
    <div class="container">
        <h2><?php echo $tempat['nama']; ?></h2>
        <img src="<?php echo base_url('assets/img/wisata/' . $tempat['foto']); ?>" alt="<?php echo $tempat['nama']; ?>">
        <div class="detail-content">
            <div class="form-group description">
                <label>Deskripsi:</label>
                <p><?php echo nl2br($tempat['deskripsi']); ?></p>
            </div>
            <div class="article-section">
                <h3>Detail Tiket:</h3>
                <p><strong>Harga:</strong> Rp <?php echo number_format($tempat['harga_tiket'], 0, ',', '.'); ?></p>
                <p><strong>Lokasi:</strong> <?php echo $tempat['lokasi']; ?></p>
                <p><strong>Jam Operasional:</strong> <?php echo nl2br($tempat['jam_operasional']); ?></p>
                <p><strong>Alamat:</strong> <?php echo nl2br($tempat['alamat']); ?></p>
                <p><strong>No. Telp:</strong> <?php echo $tempat['nomor_telepon']; ?></p>
                <p><strong>Sosial Media:</strong> <?php echo nl2br($tempat['sosial_media']); ?></p>
            </div>
        </div>
        <a href="<?php echo base_url('Ctiket/pesan/' . $tempat['id']); ?>" class="pesan-button">Pesan Tiket</a>
    </div>
    <?php $this->load->view('partials/footer'); ?>
</body>
</html>
