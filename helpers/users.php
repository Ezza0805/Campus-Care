<?php

function getAuthUser($pdo) {
    $userId = $_SESSION['user_id'] ?? null;

    if (!$userId) {
        return getFallbackUser();
    }

    $stmt = $pdo->prepare("SELECT name, identity_number, department, status, avatar FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user ?: getFallbackUser();
}

function getFallbackUser() {
    return [
        'name'            => 'Pengguna',
        'identity_number' => '-',
        'department'      => 'Mahasiswa',
        'status'          => 'aktif',
        'avatar'          => null
    ];
}

?>