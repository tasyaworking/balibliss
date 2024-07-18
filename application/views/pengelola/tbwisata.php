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
            <h1>Tabel Data Tempat Wisata</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Sponsor</th>
                            <th>Deskripsi</th>
							<th>Action</th>
                            <!-- Tambahkan kolom-kolom lain yang dibutuhkan -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data_sponsor)) : ?>
                            <?php foreach ($data_sponsor as $sponsor) : ?>
                                <tr>
                                    <td><?= $sponsor->id ?></td>
                                    <td><?= $sponsor->nama_sponsor ?></td>
                                    <td><?= $sponsor->deskripsi ?></td>
									<td class="text-center">
							<button type="button" class="btn btn-primary" onclick="view(<?=$row->id_sponsor?>)"><i
									class="ti ti-eye"></i></button>
							<button type="button" class="btn btn-success" onclick="hapus(<?=$row->id_sponsor?>)"><i
									class="ti ti-check"></i></button>
							<button type="button" class="btn btn-danger" onclick="hapus(<?=$row->id_sponsor?>)"><i
									class="ti ti-x"></i></button>
						</td>
                                    <!-- Tambahkan kolom-kolom lain yang dibutuhkan -->
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">Tidak ada data sponsor yang tersedia.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- main -->
</div>
<?=$footer?>