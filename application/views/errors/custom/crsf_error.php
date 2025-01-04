<!DOCTYPE html>
<html>
<head>
    <title>Sesi Berakhir</title>
    <script>
        // Redirect ke halaman login setelah 5 detik
        setTimeout(function() {
            window.location.href = '<?php echo base_url('auth/login'); ?>';
        }, 5000); // 5000 ms = 5 detik
    </script>
</head>
<body>
    <h1>Sesi Anda Telah Berakhir</h1>
    <p>Anda akan diarahkan ke halaman login dalam 5 detik.</p>
    <p>Jika tidak, klik <a href="<?php echo base_url('auth/login'); ?>">di sini</a>.</p>
</body>
</html>
