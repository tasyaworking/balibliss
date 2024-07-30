<link rel="stylesheet" href="<?=base_url();?>assets/DataTables/datatables.css">
<h4 class="mb-4">Tabel Tempat Wisata</h4>
<div>
	<div class="card-header d-flex justify-content-end">
		<!-- <button id="btn-tampil" type="button" onclick="hideShow()" class="btn btn-light px-5">Form Show</button> -->
	</div>
	<div class="card-body">
		<div style="overflow-x:scroll;">
			<table id="myTable" class="table table-bordered display table-striped ">
				<thead class="table-light">
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Gambar</th>
						<th class="text-center">Nama Pengelola</th>
						<th class="text-center">Nama Tempat Wisata</th>
                        <th class="text-center">Alamat</th>
						<th class="text-center">No telp</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody class="table-light">
					<?php 
				$no=1;
				foreach($data_tempat_wisata as $row):
				?>
					<tr>
						<td><?=$no++?></td>
                        <td><img src="<?php echo base_url('uploads/' . $row->foto);?>" width="120"></td>
						<td><?=$row->nama?></td>
						<td><?=$row->nama_wisata?></td>
						<td width="25%"><?=$row->alamat_wisata?></td>
						<td><?=$row->no_hp_wisata?></td>
						<td class="text-center">
						<a href="<?= site_url('cadmin/view_tempatwisata_id/'.$row->id_wisata) ?>" class="btn btn-primary">
							<i class="ti ti-eye"></i>
						</a>

							<!-- <button type="button" class="btn btn-primary" onclick="view(<?=$row->id_wisata?>)"><i
									class="ti ti-eye"></i></button> -->
							<!-- <button type="button" class="btn btn-success" onclick="hapus(<?=$row->id_user?>)"><i
									class="ti ti-check"></i></button>
							<button type="button" class="btn btn-danger" onclick="hapus(<?=$row->id_user?>)"><i
									class="ti ti-x"></i></button> -->
						</td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
	<script src="<?=base_url();?>assets/DataTables/datatables.js"></script>
	<script>
		let table = new DataTable('#myTable', {

		});
		var div = document.getElementById('form');
		var btn = document.getElementById('btn-tampil');
		var display = 1;

		function view(id_wisata) {
			load("cadmin/view_tempatwisata_id/" + id_wisata, "#script");
		}

		// function hideShow() {
		// 	if (display == 1) {
		// 		btn.textContent = 'Form Hide'
		// 		div.style.display = 'block';
		// 		display = 0;
		// 	} else {
		// 		btn.textContent = 'Form Show'
		// 		div.style.display = 'none';
		// 		display = 1;
		// 	}
		// }

		// function editdata(id_pengguna) {
		// 	btn.textContent = 'Form Hide'
		// 	div.style.display = 'block';
		// 	display = 0;
		// 	load("csuperadmin/edit_jurusan/" + id_jurusan, "#script");
		// }

		// function hapus(id_jurusan) {
		// 	if (confirm("Apakah yakin menghapus data ini?")) {
		// 		window.open("<?=base_url('csuperadmin/delete_jurusan/')?>" + id_jurusan, '_self');
		// 	}
		// }

	</script>
