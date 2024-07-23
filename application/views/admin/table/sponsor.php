<link rel="stylesheet" href="<?=base_url();?>assets/DataTables/datatables.css">
<h4 class="mb-4">Tabel Pengajuan Sponsor</h4>
<div>
	<div class="card-header d-flex justify-content-end">
	</div>
	<div class="card-body">
		<div style="overflow-x:scroll;">
			<table id="myTable" class="table table-bordered display table-striped ">
				<thead class="table-light">
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Nama</th>
                        <th class="text-center">Tanggal mulai</th>
						<th class="text-center">Tanggal selesai</th>
						<th class="text-center">Pembayaran</th>
						<th class="text-center">Bukti pembayaran</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody class="table-light">
					<?php 
				$no=1;
				foreach($data_pengajuan_sponsor as $row):
				?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$row->nama_wisata?></td>
						<td><?=$row->tanggal_mulai?></td>
						<td><?=$row->tanggal_selesai?></td>
						<!-- <td>Rp<?=$row->pembayaran?></td> -->
						<td>Rp<?= number_format($row->pembayaran, 0, ',', '.') ?></td>
						<td><img src="<?php echo base_url('assets/img/wisata/' . $row->bukti_pembayaran);?>" width="120"></td>
						<td class="text-center">
							<button type="button" class="btn btn-success" onclick="terima(<?=$row->id_sponsor?>)"><i
									class="ti ti-check"></i></button>
							<button type="button" class="btn btn-danger" onclick="tolak(<?=$row->id_sponsor?>)"><i
									class="ti ti-x"></i></button>
						</td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>


	<script>
		
		function terima(id_sponsor) {
			if(confirm("Apakah yakin menerima sponsor ini?")) {
				window.open("<?php echo base_url(); ?>cadmin/terima_sponsor/"+id_sponsor,"_self");
			}	
		}

		function tolak(id_sponsor) {
			if(confirm("Apakah yakin menolak sponsor ini?")) {
				window.open("<?php echo base_url(); ?>cadmin/tolak_sponsor/"+id_sponsor,"_self");
			}	
		}


	</script>
