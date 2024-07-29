<?php
 <tbody class="table-light">
 <?php 
 $no = 1;
 foreach ($data_tempatwisata as $row): ?>
     <tr>
         <td><?= $no++ ?></td>
         <td><?= htmlspecialchars($row->nama_wisata) ?></td>
         <td><?= htmlspecialchars($row->sosmed) ?></td>
         <td><?= htmlspecialchars($row->jam_operasional) ?></td>
         <td><img src="<?= base_url('uploads/' . $row->foto) ?>" alt="Gambar" width="100"></td>
         <td><?= htmlspecialchars($row->alamat_wisata) ?></td>
         <td><?= htmlspecialchars($row->lokasi) ?></td>
         <td><?= htmlspecialchars($row->no_hp_wisata) ?></td>
         <td><?= htmlspecialchars($row->no_rek) ?></td>
         <td><?= htmlspecialchars($row->harga_tiket) ?></td>
         <td><?= htmlspecialchars($row->deskripsi_singkat) ?></td>
         <td><?= htmlspecialchars($row->deskripsi) ?></td>
         <td class="text-center">
             <a href="<?= site_url('cpengelola/edit/' . $row->id_wisata); ?>" class="btn btn-warning">
                 <i class="fas fa-pencil-alt"></i>
             </a>
             <a href="<?= site_url('cpengelola/delete/' . $row->id_wisata); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                 <i class="fas fa-trash"></i>
             </a>
         </td>
     </tr>
 <?php endforeach; ?>
</tbody>
?>