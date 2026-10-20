<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Panggil file database.php untuk mendapatkan konstanta BASE_URL
require_once __DIR__ . '/../config/database.php';

// Memastikan user sudah login
function checkAuth() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: " . BASE_URL . "login.php");
        exit();
    }
}

// Memastikan user memiliki role yang sesuai
function checkRole($allowed_roles = []) {
    checkAuth();
    if (!in_array($_SESSION['role'], $allowed_roles)) {
        header("Location: " . BASE_URL . "login.php");
        exit();
    }
}