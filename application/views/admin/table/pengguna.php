<link rel="stylesheet" href="<?=base_url();?>assets/DataTables/datatables.css">
<h4 class="mb-4">Tabel Data Pengguna</h4>
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
						<th class="text-center">Nama</th>
						<th class="text-center">Email</th>
						<th class="text-center">Alamat</th>
                        <th class="text-center">No telp</th>
						<th class="text-center">Level</th>
						<!-- <th class="text-center">Action</th> -->
					</tr>
				</thead>
				<tbody class="table-light">
					<?php 
				$no=1;
				foreach($data_pengguna as $row):
				?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$row->nama?></td>
						<td><?=$row->email?></td>
						<td><?=$row->alamat?></td>
						<td><?=$row->no_hp?></td>
                        <td><?=$row->level?></td>
						<!-- <td class="text-center">
							<button type="button" class="btn btn-warning" onclick="editdata(<?=$row->id_user?>)"><i
									class="ti ti-pencil"></i></button>
							<button type="button" class="btn btn-danger" onclick="hapus(<?=$row->id_user?>)"><i
									class="ti ti-trash"></i></button>
						</td> -->
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


	</script>
