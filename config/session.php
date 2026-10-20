<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah user sudah login
function checkLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}

// Cek hak akses berdasarkan role (admin, petugas, mahasiswa)
function checkRole($allowed_roles = []) {
    checkLogin();
    if (!in_array($_SESSION['role'], $allowed_roles)) {
        echo "Akses ditolak! Anda tidak memiliki izin untuk membuka halaman ini.";
        exit();
    }
}