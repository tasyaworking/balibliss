<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Rating dan Ulasan</title>
</head>
<body>
    <h2>Daftar Rating dan Ulasan</h2>
    <table border="1">
        <tr>
            <th>ID Tempat Wisata</th>
            <th>ID Pengguna</th>
            <th>Rating</th>
            <th>Ulasan</th>
            <th>Tanggal</th>
        </tr>
        <?php foreach ($ratings as $rating): ?>
        <tr>
            <td><?= $rating->place_id ?></td>
            <td><?= $rating->user_id ?></td>
            <td><?= $rating->rating ?></td>
            <td><?= $rating->review ?></td>
            <td><?= $rating->date ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
