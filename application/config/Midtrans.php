<?php
// config/Midtrans.php

// Pastikan file autoload.php sudah di-include
require_once APPPATH . '../vendor/autoload.php';

defined('BASEPATH') OR exit('No direct script access allowed');

// Konfigurasi Midtrans
$config['midtrans_server_key'] = 'SB-Mid-server-BqLu6hVuyH-K8SLkoFzu61XV'; // Ganti sesuai server key Anda
$config['midtrans_client_key'] = 'SB-Mid-client-eIPH5KKwl-yYKH9I'; // Ganti sesuai client key Anda
$config['midtrans_is_production'] = false; // Gunakan sandbox mode
$config['midtrans_is3ds'] = true; // Aktifkan 3D Secure