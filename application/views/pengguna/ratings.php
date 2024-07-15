<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rating dan Ulasan</title>
</head>
<body>
    <h2>Beri Rating dan Ulasan untuk Tempat Wisata</h2>
    <form action="<?= site_url('Crating/submit_rating') ?>" method="post">
        <label for="place_id">ID Tempat Wisata:</label>
        <input type="text" id="place_id" name="place_id" required><br><br>

        <label for="user_id">ID Pengguna:</label>
        <input type="text" id="user_id" name="user_id" required><br><br>

        <label for="rating">Rating (1-5):</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>

        <label for="review">Ulasan:</label>
        <textarea id="review" name="review" required></textarea><br><br>

        <input type="submit" value="Kirim">
    </form>
</body>
</html>
