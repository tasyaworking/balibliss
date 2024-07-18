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
            <div class="card">
                <div class="card-header">
                    <h3><?=isset($pengguna) ? 'Edit' : 'Tambah'?> Pengguna</h3>
                </div>
                <div class="card-body">
                    <?=form_open(isset($pengguna) ? 'Cpengguna/update/'.$pengguna->id : 'Cpengguna/store')?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=isset($pengguna) ? $pengguna->email : ''?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?=isset($pengguna) ? $pengguna->nama : ''?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required><?=isset($pengguna) ? $pengguna->alamat : ''?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?=isset($pengguna) ? $pengguna->no_hp : ''?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><?=isset($pengguna) ? 'Update' : 'Tambah'?></button>
                    <?=form_close()?>
                </div>
            </div>
        </div>
    </div>
    <!-- main -->
</div>
<?=$footer?>
