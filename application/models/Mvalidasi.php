<?php
	class Mvalidasi extends CI_Model
	{
		function validasi()
		{
			if (empty($this->session->userdata('id_user')))
			{
					echo "<script>alert ('Anda tidak dapat mengakses halaman ini..!');</script>";
					redirect('cauth/login','refresh');
			}
		}
		
		
		// public function cek_level_user($id_ukm) {
        //     $id_mahasiswa = $this->session->userdata('id_mahasiswa');
        //     $query = $this->db->get_where('cekfungsionaris',['id_mahasiswa'=>$id_mahasiswa,'id_ukm'=>$id_ukm,'status'=>'aktif']);
        //     if($query->num_rows()>0){
		// 		$data=$query->row();
		// 		$array=array(
		// 			'level'=>'fungsionaris',
		// 			'id_fungsionaris'=>$data->id_fungsionaris,
		// 		);	
		// 		$this->session->set_userdata($array);
        //     }else{
		// 		$query1 = $this->db->get_where('cekanggota',['id_mahasiswa'=>$id_mahasiswa,'id_ukm'=>$id_ukm,'status'=>'aktif']);
		// 		if($query1->num_rows()>0){
		// 			$data1=$query1->row();
		// 			$array1=array(
		// 				'level'=>'anggota_ukm',
		// 				'id_anggota_ukm'=>$data1->id_anggota_ukm,
		// 			);
		// 			$this->session->set_userdata($array1);
		// 		}else{
		// 			$array2=array(
		// 				'level'=>'mahasiswa',
		// 			);	
		// 			$this->session->set_userdata($array2);
        //     	};
        // 	}
		// }
	}
?>
