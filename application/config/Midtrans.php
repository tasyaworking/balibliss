<?php
// config/Midtrans.php

// Pastikan file autoload.php sudah di-include
require_once 'vendor/autoload.php';

// Set API keys untuk akun Midtrans Anda
\Midtrans\Config::$serverKey = 'YOUR_SERVER_KEY'; // Gantilah dengan server key Anda
\Midtrans\Config::$clientKey = 'YOUR_CLIENT_KEY'; // Gantilah dengan client key Anda

// Tentukan environment, apakah menggunakan sandbox (untuk pengujian) atau production (untuk transaksi nyata)
\Midtrans\Config::$isProduction = false; // false untuk sandbox, true untuk live

// Aktifkan 3D Secure untuk otentikasi kartu kredit
\Midtrans\Config::$is3ds = true; // Set true untuk mengaktifkan 3D Secure (3DS)

// Jika Anda menggunakan fitur "Bank Transfer" atau "E-Wallet", Anda dapat menambahkan konfigurasi lainnya sesuai kebutuhan
// \Midtrans\Config::$bankTransfer = true; // Aktifkan untuk pembayaran menggunakan transfer bank
// \Midtrans\Config::$ewallet = true; // Aktifkan untuk pembayaran menggunakan e-wallet

?>
