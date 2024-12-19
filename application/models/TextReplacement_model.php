<?php
class TextReplacement_model extends CI_Model {

    // Fungsi untuk mengganti teks dalam file
    public function replace_text_in_file($filePath, $search, $replace) {
        // Cek apakah file ada
        if (file_exists($filePath)) {
            // Membaca konten file
            $fileContent = file_get_contents($filePath);

            // Mengganti teks yang diinginkan
            $fileContent = str_replace($search, $replace, $fileContent);

            // Menyimpan perubahan kembali ke file
            file_put_contents($filePath, $fileContent);
            return true;
        } else {
            // Jika file tidak ditemukan
            return false;
        }
    }
}
?>
