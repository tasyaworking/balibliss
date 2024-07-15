<!-- Header Start -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/stylesnav.css">
<header class="app-header border-bottom border-1 border-light" style="background-color: white;">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="<?=base_url()?>assets/img/BaliBlissLogo.png" height="40" width="140" alt="Logo">
            </a>
            <!-- Toggler button for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <?php if (!empty($this->session->userdata('img_mahasiswa'))) : ?>
                                <img src="<?=base_url('assets/uploads/img_mahasiswa/').$this->session->userdata('img_mahasiswa')?>" alt=""
                                     width="35" height="35" class="rounded-circle">
                            <?php else : ?>
                                <img src="<?=base_url()?>assets/img/user_logo.png" alt="" width="35" height="35"
                                     class="rounded-circle">
                            <?php endif; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <div class="d-flex align-items-center gap-2 dropdown-item justify-content-center">
                                    <?php if (!empty($this->session->userdata('nama_mahasiswa'))) : ?>
                                        <?= $this->session->userdata('nama_mahasiswa') ?>
                                    <?php else : ?>
                                        <?= $this->session->userdata('username') ?>
                                    <?php endif; ?>
                                </div>
                                <a href="<?=base_url('cauth/logout')?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Header End -->
