<?php
// Konfigurasi Database
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_NAME', 'kampuscare_db');
define('DB_USER', 'root');
define('DB_PASS', ''); // Isi password MySQL jika ada

if (!defined('BASE_URL')) {
    define('BASE_URL', 'http://localhost/Campus-care/');
}

function getConnection() {
    $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Menampilkan error sebagai exception
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,     // Hasil query otomatis berupa array asosiatif
        PDO::ATTR_EMULATE_PREPARES   => false,                 // Menggunakan prepared statement asli MySQL
    ];

    try {
        return new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        // Hentikan proses jika koneksi gagal
        die("Koneksi database gagal: " . $e->getMessage());
    }
}

// Objek PDO siap pakai
$pdo = getConnection();