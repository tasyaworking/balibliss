<?=$header?>
<!--  Body Wrapper -->
<div class="page-wrapper"  id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
	data-sidebar-position="fixed" data-header-position="fixed">
	<?=$sidebar;?>
	<!--  Main wrapper -->
	<div class="body-wrapper ">
        <?=$navbar?>
		<!-- main -->
		<div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tabel Data Pengunjung</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_pengguna as $pengunjung): ?>
                                        <tr>
                                            <td><?= $pengunjung['id'] ?></td>
                                            <td><?= $pengunjung['nama'] ?></td>
                                            <td><?= $pengunjung['email'] ?></td>
                                            <td><?= $pengunjung['alamat'] ?></td>
                                            <td><?= $pengunjung['no_hp'] ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<!-- main -->
	</div>
	<!--  Main wrapper -->
    <?=$footer?>
</div>
<!--  Body Wrapper -->
