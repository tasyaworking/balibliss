<?=$header?>
<!-- Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <?=$sidebar;?>
    <!-- Main wrapper -->
    <div class="body-wrapper">
        <?=$navbar?>
        <!-- Main content -->
        <div class="container-fluid">
            <?php
            $pesan = $this->session->flashdata('pesan');
            $color = $this->session->flashdata('color');
            if (!empty($pesan)):
            ?>
            <div class="alert alert-<?=$color?> alert-dismissible fade show" role="alert">
                <?=$pesan?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            endif;
            ?>
            
            <?php
            if (!empty($konten) || !empty($table)) {
                if (!empty($konten)) {
                    echo $konten;
                }
                if (!empty($table)) {
                    echo $table;
                }
            } else {
            ?>
            <h4 class="mb-4">Tabel Data Tempat Wisata</h4>
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="<?= site_url('cpengelola/add'); ?>" class="btn btn-success">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div style="overflow-x:auto;">
                        <table id="myTable" class="table table-bordered display table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Destinasi</th>
                                    <th class="text-center">Sosial Media</th>
                                    <th class="text-center">Jam Operasional</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">No Telp</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                <?php 
                                $no = 1;
                                foreach ($data_tempatwisata as $row): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($row->nama_wisata) ?></td>
                                        <td><?= htmlspecialchars($row->sosmed) ?></td>
                                        <td><?= htmlspecialchars($row->jam_operasional) ?></td>
                                        <td><img src="<?= base_url('uploads/' . $row->gambar) ?>" alt="Gambar" width="100"></td>
                                        <td><?= htmlspecialchars($row->alamat_wisata) ?></td>
                                        <td><?= htmlspecialchars($row->no_hp_wisata) ?></td>
                                        <td><?= htmlspecialchars($row->deskripsi) ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('cpengelola/edit/' . $row->id_wisata); ?>" class="btn btn-warning">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?= site_url('cpengelola/delete/' . $row->id_wisata); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Main -->
</div>
<?=$footer?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Data Tempat Wisata</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/DataTables/datatables.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Gaya khusus jika diperlukan */
        table.dataTable {
            border-collapse: collapse;
            width: 100%;
            background-color: #fff; /* Background putih */
        }
        table.dataTable thead th {
            background-color: #f8f9fa; /* Background header */
            color: #000; /* Teks header */
        }
        table.dataTable tbody tr {
            background-color: #fff; /* Background baris */
        }
        table.dataTable tbody tr:nth-child(even) {
            background-color: #f2f2f2; /* Background baris genap */
        }
        table.dataTable tbody tr:hover {
            background-color: #e0e0e0; /* Background hover */
        }
        table.dataTable td, table.dataTable th {
            padding: 95px; /* Mengatur padding untuk memperbesar ukuran tabel */
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .container-fluid {
            padding: 20px;
        }
        .card {
            margin: 30px 0;
        }
        .card-header {
            background-color: #f8f9fa;
            padding: 15px;
        }
        .btn {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <script src="<?= base_url(); ?>assets/DataTables/datatables.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let table = new DataTable('#myTable', {
                scrollX: true // Mengaktifkan scrollbar horizontal
            });
        });
    </script>
</body>
</html>
