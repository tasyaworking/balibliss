<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Menggunakan autoload dari Composer
require_once APPPATH . 'third_party/dompdf/vendor/autoload.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
    public function __construct()
    {
        parent::__construct();
    }
}
