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
		
	
	}
?>
