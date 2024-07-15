<?=$header?>
<!-- Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <?=$sidebar;?>
    <!-- Main wrapper -->
    <div class="body-wrapper">
        <?=$navbar?>
        <!-- main -->
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
            <div class="card">
                <div class="card-header">
                    <h3>Daftar Pengguna</h3>
                    <a href="<?=site_url('Cpengguna/create')?>" class="btn btn-primary">Tambah Pengguna</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pengguna as $user): ?>
                            <tr>
                                <td><?=$user->email?></td>
                                <td><?=$user->nama?></td>
                                <td><?=$user->alamat?></td>
                                <td><?=$user->no_hp?></td>
                                <td>
                                    <a href="<?=site_url('Cpengguna/edit/'.$user->id)?>" class="btn btn-warning">Edit</a>
                                    <a href="<?=site_url('Cpengguna/delete/'.$user->id)?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- main -->
</div>
<?=$footer?>
