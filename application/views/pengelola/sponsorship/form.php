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
    <?php echo form_label('Tanggal Mulai', 'tanggal_mulai'); ?>
    <?php echo form_input('tanggal_mulai', set_value('tanggal_mulai'), ['type' => 'date', 'class' => 'form-control', 'id' => 'tanggal_mulai']); ?>
</div>
<div class="mb-3">
    <?php echo form_label('Tanggal Selesai', 'tanggal_selesai'); ?>
    <?php echo form_input('tanggal_selesai', set_value('tanggal_selesai'), ['type' => 'date', 'class' => 'form-control', 'id' => 'tanggal_selesai']); ?>
</div>

                    <div class="mb-3">
                        <?php echo form_label('Total Pembayaran', 'pembayaran'); ?>
                        <?php echo form_input('pembayaran', set_value('pembayaran'), ['class' => 'form-control', 'id' => 'pembayaran']); ?>
                    </div>
                    <div class="mb-3">
                        <?php echo form_label('Bukti Pembayaran', 'bukti_pembayaran'); ?>
                        <?php echo form_upload('bukti_pembayaran', '', ['class' => 'form-control', 'id' => 'bukti_pembayaran']); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <?= $footer ?>
</div>
