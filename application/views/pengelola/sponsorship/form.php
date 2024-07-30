<?= $header ?>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <?= $sidebar; ?>
    <div class="body-wrapper">
        <?= $navbar ?>
        <div class="container-fluid">
            <?php
            $pesan = $this->session->flashdata('pesan');
            $color = $this->session->flashdata('color');
            if (!empty($pesan)):
            ?>
            <div class="alert alert-<?= $color ?> alert-dismissible fade show" role="alert">
                <?= $pesan ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>
            <h4 class="mb-4">Daftar Sponsorship</h4>
            <div class="card">
                <div class="card-body">
                    <?php echo form_open_multipart('Csponsorship/submit'); ?>
                    
                    <div class="mb-3">
                        <?php echo form_label('Nama Sponsor', 'nama'); ?>
                        <?php echo form_input('nama', set_value('nama'), ['class' => 'form-control', 'id' => 'nama']); ?>
                    </div>
                    <div class="mb-3">
                        <?php echo form_label('Email Sponsor', 'email'); ?>
                        <?php echo form_textarea('email', set_value('email'), ['class' => 'form-control', 'id' => 'email']); ?>
                    </div>

                    <div class="mb-3">
                        <?php echo form_label('No Telp', 'telepon'); ?>
                        <?php echo form_input('telepon', set_value('telepon'), ['class' => 'form-control', 'id' => 'telepon']); ?>
                    </div>

                    <div class="mb-3">
                        <?php echo form_label('Nama Perusahaan', 'perusahaan'); ?>
                        <?php echo form_input('perusahaan', set_value('perusahaan'), ['class' => 'form-control', 'id' => 'perusahaan']); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <?= $footer ?>
</div>