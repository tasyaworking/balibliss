<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TextReplacement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memuat model TextReplacement_model
        $this->load->model('TextReplacement_model');
    }

    // Fungsi untuk mengganti teks di file
    public function replace_text() {
        // Path file yang ingin diganti teksnya
        $filePath = 'vendor/mikey179/vfsstream/src/main/php/org/bovigo/vfs/vfsStream.php';

        // Teks yang ingin diganti
        $search = 'name{0}';
        $replace = 'name[0]';

        // Memanggil fungsi model untuk mengganti teks
        $result = $this->TextReplacement_model->replace_text_in_file($filePath, $search, $replace);

        if ($result) {
            echo "Teks berhasil diganti!";
        } else {
            echo "File tidak ditemukan!";
        }
    }
}
?>
