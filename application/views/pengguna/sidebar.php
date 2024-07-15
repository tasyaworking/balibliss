<!-- Sidebar Start -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/stylesnav.css">
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Brand logo and close button -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?=base_url('Cpengguna/dashboard')?>" class="text-nowrap logo-img">
                <!-- Placeholder for logo image -->
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?=base_url('Crating/dashboard')?>" aria-expanded="false">
                        <span><i class="ti ti-layout-dashboard"></i></span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?=base_url('Cpengguna/index')?>" aria-expanded="false">
                        <span><i class="ti ti-user"></i></span>
                        <span class="hide-menu">Pembelian Tiket</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?=base_url('Crating/index')?>" aria-expanded="false">
                        <span><i class="ti ti-building-community"></i></span>
                        <span class="hide-menu">Pemberian Rating dan Ulasan</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- Sidebar End -->
