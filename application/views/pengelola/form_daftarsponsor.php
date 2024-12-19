<<?=$header?>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <?=$sidebar;?>
    <div class="body-wrapper">
        <?=$navbar?>
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
                <h4 class="mb-4">Daftar Sponsorship</h4>
                <div class="card">
                    <div class="card-body">
                        <?php echo form_open_multipart('cpengelola/daftarsponsor'); ?>
                        
                        <div class="mb-3">
                            <?php echo form_label('Nama Sponsor', 'nama_sponsor'); ?>
                            <?php echo form_input('nama_sponsor', set_value('nama_sponsor'), ['class' => 'form-control', 'id' => 'nama_sponsor']); ?>
                        </div>

                        <div class="mb-3">
                            <?php echo form_label('Deskripsi Sponsor', 'deskripsi'); ?>
                            <?php echo form_textarea('deskripsi', set_value('deskripsi'), ['class' => 'form-control', 'id' => 'deskripsi']); ?>
                        </div>

                        <div class="mb-3">
                            <?php echo form_label('Sosial Media', 'sosial_media'); ?>
                            <?php echo form_input('sosial_media', set_value('sosial_media'), ['class' => 'form-control', 'id' => 'sosial_media']); ?>
                        </div>

                        <div class="mb-3">
                            <?php echo form_label('Alamat', 'alamat'); ?>
                            <?php echo form_input('alamat', set_value('alamat'), ['class' => 'form-control', 'id' => 'alamat']); ?>
                        </div>

                        <div class="mb-3">
                            <?php echo form_label('No HP', 'no_hp'); ?>
                            <?php echo form_input('no_hp', set_value('no_hp'), ['class' => 'form-control', 'id' => 'no_hp']); ?>
                        </div>

                        <div class="mb-3">
                            <?php echo form_label('Logo Sponsor', 'gambar'); ?>
                            <?php echo form_upload('gambar', '', ['class' => 'form-control', 'id' => 'gambar']); ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Daftar</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $footer; ?>