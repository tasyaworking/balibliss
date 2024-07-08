<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pembelian Tiket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .card h1 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type=text],
        .form-group input[type=email],
        .form-group input[type=number] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form-group button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Formulir Pembelian Tiket</h1>
        <form action="<?php echo base_url('Ctiket/konfirmasi_pemesanan'); ?>" method="post">
            <input type="hidden" name="id_wisata" value="<?php echo isset($wisata['id_wisata']) ? $wisata['id_wisata'] : ''; ?>">
            
            <!-- Menampilkan informasi nama wisata dan harga tiket -->
            <div class="form-group">
                <label for="nama_wisata">Nama Wisata:</label>
                <input type="text" id="nama_wisata" name="nama_wisata" value="<?php echo isset($wisata['nama_wisata']) ? $wisata['nama_wisata'] : ''; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="harga_tiket">Harga Tiket (Rp):</label>
                <input type="text" id="harga_tiket" name="harga_tiket" value="<?php echo isset($wisata['harga_tiket']) ? number_format($wisata['harga_tiket'], 0, ',', '.') : ''; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="nama_pemesan">Nama Pemesan:</label>
                <input type="text" id="nama_pemesan" name="nama_pemesan" required>
            </div>
            
            <div class="form-group">
                <label for="email_pemesan">Email Pemesan:</label>
                <input type="email" id="email_pemesan" name="email_pemesan" required>
            </div>
            
            <div class="form-group">
                <label for="jumlah_tiket">Jumlah Tiket:</label>
                <input type="number" id="jumlah_tiket" name="jumlah_tiket" required>
            </div>
            
            <div class="form-group">
                <button type="submit">Lanjutkan</button>
            </div>
        </form>
    </div>
    <?php $this->load->view('partials/footer'); ?>
</body>
</html>
