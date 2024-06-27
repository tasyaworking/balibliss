<!--  Header Start -->
<header class="app-header border-bottom border-1 border-ligth">
	<nav class="navbar navbar-expand-lg navbar-light">
		<ul class="navbar-nav">
			<li class="nav-item d-block d-xl-none">
				<a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
					<i class="ti ti-menu-2"></i>
				</a>
			</li>
		</ul>
		<div class="navbar-collapse justify-content-end px-0" id="navbarNav">
			<ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

				<li class="nav-item dropdown">
					<a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
						aria-expanded="false">
						<?php if (!empty($this->session->userdata('img_mahasiswa'))) :?>
						<img src="<?=base_url('assets/uploads/img_mahasiswa/').$this->session->userdata('img_mahasiswa')?>" alt=""
							width="35" height="35" class="rounded-circle">
						<?php else:?>
						<img src="<?=base_url()?>assets/img/user_logo.png" alt="" width="35" height="35"
							class="rounded-circle">
						<?php endif; ?>
					</a>
					<div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
						<div class="message-body">
							<div class="d-flex align-items-center gap-2 dropdown-item justify-content-center">
								<?php if (!empty($this->session->userdata('nama_mahasiswa'))) :?>
                    <?=$this->session->userdata('nama_mahasiswa')?>
								<?php else:?>
                  <?=$this->session->userdata('username')?>
								<?php endif; ?> </div>
							<!-- <a href="<?=base_url('cmahasiswa/profile/').$this->session->userdata('id_mahasiswa')?>" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a> -->
							<a href="<?=base_url('cauth/logout')?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</header>
<!--  Header End -->
