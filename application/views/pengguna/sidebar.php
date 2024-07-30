<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?=base_url('Cadmin/dashboard')?>" class="text-nowrap logo-img">
                <table>
                    <tbody>
                        <tr>
                            <td><img src="<?=base_url()?>assets/img/BaliBlissLogo.png" 
                                    width="150"></td>
                            <td class="text-dark fs-3"><b> </b></td>
                        </tr>
                    </tbody>
                </table>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?=base_url('Cpengguna/index')?>" aria-expanded="false">
                        <span>
                        <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
    					<a class="sidebar-link" href="<?=base_url('Ctiket/keranjang')?>" aria-expanded="false">
    						<span>
    							<i class="ti ti-user-check"></i>
    						</span>
    						<span class="hide-menu">Riwayat</span>
    					</a>
    				</li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?=base_url('Ctiket/ratings')?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-building-community"></i>
                        </span>
                        <span class="hide-menu">Rating & Ulasan</span>
                    </a>
                </li>
            </ul>
            <!-- Tampilkan pesan selamat datang di sini -->
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->

<style>
/* Tambahkan sedikit styling untuk pesan selamat datang */
.welcome-message {
    padding: 20px;
    background-color: #007bff;
    color: #fff;
    text-align: center;
    border-radius: 4px;
    margin: 20px;
}
</style>
