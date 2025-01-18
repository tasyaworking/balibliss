<?php

defined('BASEPATH') or exit('No direct script access allowed');

// Autoload Midtrans SDK
require_once APPPATH . '../vendor/autoload.php';

class Midtrans
{
    public function __construct()
    {
        // Memuat konfigurasi Midtrans
        $CI = &get_instance();
        $CI->config->load('midtrans');

        // Inisialisasi Midtrans Config
        \Midtrans\Config::$serverKey = $CI->config->item('midtrans_server_key');
        \Midtrans\Config::$isProduction = $CI->config->item('midtrans_is_production'); // Berdasarkan konfigurasi
        \Midtrans\Config::$is3ds = $CI->config->item('midtrans_is_3ds'); // Berdasarkan konfigurasi
        \Midtrans\Config::$isSanitized = $CI->config->item('midtrans_is_sanitized') ?? true; // Default true jika tidak diatur
    }
}