<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('partials/header'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/stylesrate.css'); ?>">
    <style>
        /* CSS styles remain unchanged */
    </style>
</head>
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <?php $this->load->view('pengguna/sidebar'); ?>
    <div class="main-content">
        <?php $this->load->view('pengguna/navbar'); ?>
        <div class="main-container">
            <h1>Berikanlah Rating dan Ulasan Anda</h1>
            
            <?php if ($this->session->flashdata('success')): ?>
                <p style="color: green;"><?php echo $this->session->flashdata('success'); ?></p>
            <?php elseif ($this->session->flashdata('error')): ?>
                <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
            <?php endif; ?>

            <form action="<?php echo site_url('Ctiket/add_review'); ?>" method="post">
                <label for="id_wisata">Tiket Wisata:</label>
                <select name="id_wisata" id="id_wisata" required>
                    <?php foreach ($tickets as $ticket): ?>
                        <option value="<?php echo $ticket['id_wisata']; ?>"><?php echo $ticket['nama_wisata']; ?></option>
                    <?php endforeach; ?>
                </select><br>

                <label for="rating">Rating:</label>
                <input type="number" name="rating" id="rating" min="1" max="5" required><br>

                <label for="review">Ulasan:</label>
                <textarea name="review" id="review" required></textarea><br>

                <button type="submit">Kirim Ulasan</button>
            </form>

            <h2>Rating Ulasan Tiket</h2>
            <?php foreach ($tickets as $ticket): ?>
                <div class="kartu">
                    <img src="<?php echo base_url('assets/img/wisata/' . $ticket['foto']); ?>" alt="<?php echo $ticket['foto']; ?>">
                    <h3><?php echo $ticket['nama_wisata']; ?></h3>
                    <p><?php echo $ticket['deskripsi']; ?></p>
                    <?php
                    $reviews = $this->Mtiket->get_reviews_by_ticket_id($ticket['id_wisata']);
                    if ($reviews): ?>
                        <ul>
                            <?php foreach ($reviews as $review): ?>
                                <li>
                                    <div class="rating">
                                        <?php for ($i = 0; $i < $review['rating']; $i++): ?>
                                            <span>⭐</span>
                                        <?php endfor; ?>
                                        <?php for ($i = $review['rating']; $i < 5; $i++): ?>
                                            <span>☆</span>
                                        <?php endfor; ?>
                                    </div>
                                    <p class="ulasan"><?php echo $review['review']; ?></p>
                                    <p><strong>Pengirim:</strong> <?php echo $review['nama_pengirim']; ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>Tidak ada ulasan untuk tiket ini.</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
</body>
</html>
