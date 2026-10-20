<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/database.php';

$action = $_GET['action'] ?? '';

// ----------------------------------------------------
// 1. HANDLER LOGIN
// ----------------------------------------------------
if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected_role = $_POST['role'] ?? 'mahasiswa';
    $password = $_POST['sandi'] ?? '';

    if ($selected_role === 'mahasiswa') {
        $account_input = trim($_POST['akun_mahasiswa'] ?? '');
    } elseif ($selected_role === 'upf') {
        $account_input = trim($_POST['akun_upf'] ?? '');
    } else {
        $account_input = trim($_POST['akun_admin'] ?? '');
    }

    if (empty($account_input) || empty($password)) {
        $_SESSION['error'] = "Silakan isi identitas akun dan kata sandi Anda!";
        header("Location: " . BASE_URL . "login.php");
        exit();
    }

    $db_role = ($selected_role === 'upf') ? 'petugas' : $selected_role;

    // Perbaikan: Gunakan parameter terpisah (:email dan :identity)
    $stmt = $pdo->prepare("
        SELECT * FROM users 
        WHERE (email = :email OR identity_number = :identity) 
          AND role = :role 
        LIMIT 1
    ");
    
    $stmt->execute([
        'email'    => $account_input,
        'identity' => $account_input,
        'role'     => $db_role
    ]);
    
    $user = $stmt->fetch();

    if ($user && (password_verify($password, $user['password']) || $password === $user['password'])) {
        if ($user['status'] !== 'aktif') {
            $_SESSION['error'] = "Akun Anda sedang dinonaktifkan. Silakan hubungi admin.";
            header("Location: " . BASE_URL . "login.php");
            exit();
        }

        $_SESSION['user_id']         = $user['id'];
        $_SESSION['name']            = $user['name'];
        $_SESSION['role']            = $user['role'];
        $_SESSION['identity_number'] = $user['identity_number'];

        if ($user['role'] === 'admin') {
            header("Location: " . BASE_URL . "resources/views/admin/dashboard.php");
        } elseif ($user['role'] === 'petugas') {
            header("Location: " . BASE_URL . "resources/views/petugas/dashboard.php");
        } else {
            header("Location: " . BASE_URL . "index.php");
        }
        exit();
    } else {
        $_SESSION['error'] = "Identitas akun atau kata sandi tidak cocok dengan role " . strtoupper($selected_role) . "!";
        header("Location: " . BASE_URL . "login.php");
        exit();
    }
}

// ----------------------------------------------------
// 2. HANDLER REGISTER
// ----------------------------------------------------
if ($action === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $daftar_sebagai = $_POST['daftar_sebagai'] ?? 'mahasiswa';
    $nama           = trim($_POST['nama'] ?? '');
    $nim            = trim($_POST['nim'] ?? '');
    $email          = trim($_POST['email'] ?? '');
    $sandi_baru     = $_POST['sandi_baru'] ?? '';

    if (empty($nama) || empty($nim) || empty($email) || strlen($sandi_baru) < 8) {
        $_SESSION['error'] = "Gagal mendaftar. Pastikan semua kolom diisi dan kata sandi minimal 8 karakter!";
        header("Location: " . BASE_URL . "login.php#daftar");
        exit();
    }

    $db_role = ($daftar_sebagai === 'upf') ? 'petugas' : 'mahasiswa';

    $checkStmt = $pdo->prepare("SELECT id FROM users WHERE email = :email OR identity_number = :nim LIMIT 1");
    $checkStmt->execute(['email' => $email, 'nim' => $nim]);
    if ($checkStmt->fetch()) {
        $_SESSION['error'] = "Email atau NIM/ID tersebut sudah terdaftar!";
        header("Location: " . BASE_URL . "login.php#daftar");
        exit();
    }

    $hashed_password = password_hash($sandi_baru, PASSWORD_BCRYPT);

    $insertStmt = $pdo->prepare("
        INSERT INTO users (identity_number, name, email, password, role, status) 
        VALUES (:identity, :name, :email, :password, :role, 'aktif')
    ");

    $success = $insertStmt->execute([
        'identity' => $nim,
        'name'     => $nama,
        'email'    => $email,
        'password' => $hashed_password,
        'role'     => $db_role
    ]);

    if ($success) {
        header("Location: " . BASE_URL . "login.php#daftar-berhasil");
        exit();
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat menyimpan data akun!";
        header("Location: " . BASE_URL . "login.php#daftar");
        exit();
    }
}

// ----------------------------------------------------
// 3. HANDLER LUPA PASSWORD
// ----------------------------------------------------
if ($action === 'forgot_password' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email_reset'] ?? '');
    header("Location: " . BASE_URL . "login.php#terkirim");
    exit();
}

// ----------------------------------------------------
// 4. HANDLER LOGOUT
// ----------------------------------------------------
if ($action === 'logout') {
    session_unset();
    session_destroy();
    header("Location: " . BASE_URL . "login.php");
    exit();
}