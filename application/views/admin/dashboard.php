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
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Pengguna</h5> <br/>
                            <p class="card-text display-4"><?= $count_pengguna ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-white">Total pengguna yang terdaftar</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Tempat Wisata</h5> <br/>
                            <p class="card-text display-4"><?= $count_tempat_wisata ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-white">Tempat wisata yang terdaftar</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Pengajuan Pengelola</h5>
                            <p class="card-text display-4"><?= $count_pengelola ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-white">Pengajuan sebagai pengelola</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Sponsor Diterima</h5> <br/> 
                            <p class="card-text display-4"><?= $count_sponsor_accepted ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-white">Jumlah sponsor yang diterima</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <h5 class="card-title">Sponsor Belum Diterima</h5>
                            <p class="card-text display-4"><?= $count_sponsor_pending ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-white">Jumlah sponsor yang belum diterima</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card text-white bg-secondary">
                        <div class="card-body">
                            <h5 class="card-title">Total Pembayaran Sponsor</h5> <br/>
                            <p class="card-text display-4">Rp<?= number_format($total_pembayaran, 0, ',', '.') ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-white">Jumlah total pembayaran</small>
                        </div>
                    </div>
                </div>
            </div>


		</div>
	</div>
	<!-- main -->
</div>
<?=$footer?>