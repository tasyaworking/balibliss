<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('partials/header'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/styleskonfirm.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-eIPH5KKwl-yYKH9I">
    </script>
    <style>
    .page-wrapper {
        display: flex;
        height: 100vh;
        overflow: hidden;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #343a40;
        color: white;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .navbar {
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 999;
        position: fixed;
        top: 0;
        right: 0;
        width: calc(100% - 250px);
    }

    .main-content {
        flex: 1;
        margin-top: 90px;
        margin-left: 280px;
        overflow-y: auto;
        padding: 20px;
        height: calc(100vh - 50px);
        background: linear-gradient(to right, #e0f7ff, #ffffff);
    }

    .container {
        margin-top: 20px;
    }

    .card {
        padding: 30px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        max-width: 1000px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .card-content {
        display: flex;
        justify-content: space-between;
    }

    .info {
        flex: 1;
    }

    .note {
        flex: 0 0 300px;
        margin-left: 20px;
        padding: 20px;
        background: #f9f9f9;
        border-left: 5px solid #007bff;
        border-radius: 5px;
    }

    .note h2 {
        font-size: 20px;
        margin-bottom: 10px;
    }

    .note p {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .btn-submit,
    .btn-back {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        width: 48%;
    }

    .btn-back {
        background-color: #4CAF50;
    }

    .btn-submit:hover {
        background-color: #0069d9;
    }

    .btn-back:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <?php $this->load->view('pengguna/sidebar'); ?>
        <div class="main-content">
            <?php $this->load->view('pengguna/navbar'); ?>
            <div class="main-container">
                <div class="container">
                    <h1><i class="fas fa-ticket-alt"></i> Konfirmasi Pemesanan Tiket</h1>
                    <div class="card-content">
                        <div class="info">
                            <?php if (isset($konfirmasi)) { ?>
                            <p><strong>Nama Pemesan:</strong> <?php echo $konfirmasi['nama_pemesan']; ?></p>
                            <p><strong>Jenis Kelamin:</strong> <?php echo $konfirmasi['jenis_kelamin']; ?></p>
                            <p><strong>Jumlah Tiket:</strong> <?php echo $konfirmasi['jumlah_tiket']; ?></p>
                            <p><strong>Tanggal Kunjungan:</strong> <?php echo $konfirmasi['tgl_kunjungan']; ?></p>
                            <p><strong>Total Harga:</strong> Rp
                                <?php echo isset($konfirmasi['total_harga']) ? number_format($konfirmasi['total_harga'], 0, ',', '.') : ''; ?>
                            </p>
                            <?php } else { ?>
                            <p>Data pemesanan tidak ditemukan.</p>
                            <?php } ?>
                        </div>
                        <div class="note">
                            <h2>Catatan Penting</h2>
                            <p><i class="fas fa-info-circle"></i> Tiket tidak bisa refund.</p>
                            <p><i class="fas fa-calendar-alt"></i> Tiket hanya berlaku di tanggal yang terpilih.</p>
                            <p><i class="fas fa-check-circle"></i> Konfirmasi instan setelah pembayaran.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="pay-button" class="btn-submit">Lanjutkan Pembayaran</button>
                        <button type="button" class="btn-back" onclick="history.back()">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('pay-button').onclick = function() {
        snap.pay('<?= isset($snap_token) ? $snap_token : ''; ?>', {
            onSuccess: function(result) {
                alert('Pembayaran berhasil!');
                console.log(result);
                window.location.href = "<?= base_url('Cpengguna'); ?>";
            },
            onPending: function(result) {
                alert('Pembayaran sedang diproses.');
                console.log(result);
            },
            onError: function(result) {
                alert('Pembayaran gagal!');
                console.log(result);
            }
        });
    };
    </script>
</body>

</html>