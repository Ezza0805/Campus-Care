<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KampusCare - Masuk</title>
  <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>

<main class="page">

  <!-- BAGIAN KIRI: Logo & Informasi -->
  <section class="intro">
    <div class="logo" aria-hidden="true">
      <svg viewBox="0 0 24 24" width="34" height="34" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10 12 5 2 10l10 5 10-5Z"/><path d="M6 12v5c3 2 9 2 12 0v-5"/></svg>
    </div>

    <span class="badge"><i></i> SISTEM RESMI KAMPUS</span>
    <h1>KampusCare</h1>
    <p class="subtitle">Layanan Aspirasi &amp; Pemeliharaan Sarana Prasarana Kampus</p>

    <figure class="hero">
      <div class="scene" role="img" aria-label="Ilustrasi gedung kampus">
        <span class="b b1"></span><span class="b b2"></span><span class="b b3"></span>
        <span class="tree t1"></span><span class="tree t2"></span>
      </div>
      <figcaption>
        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="m9 12 2 2 4-4"/></svg>
        Siap melayani 24/7 respon darurat &amp; pemeliharaan fasilitas.
      </figcaption>
    </figure>
  </section>

  <!-- BAGIAN KANAN: Form Login -->
  <section class="panel">

    <?php if (isset($_SESSION['error'])): ?>
      <div style="background-color: #fee2e2; border: 1px solid #f87171; color: #b91c1c; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px;">
        <?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>

    <!-- Action mengarah ke controllers/auth_process.php -->
    <form action="controllers/auth_process.php?action=login" method="POST">

      <input class="sr" type="radio" name="role" id="r-mhs" value="mahasiswa" checked>
      <input class="sr" type="radio" name="role" id="r-upf" value="upf">
      <input class="sr" type="radio" name="role" id="r-adm" value="admin">

      <p class="section-label">PILIH HAK AKSES MASUK</p>

      <div class="tabs" role="tablist">
        <label for="r-mhs" class="tab">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10 12 5 2 10l10 5 10-5Z"/><path d="M6 12v5c3 2 9 2 12 0v-5"/></svg>
          <span>Mahasiswa</span>
        </label>
        <label for="r-upf" class="tab">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3.5"/><path d="M2 20c0-3.5 3-6 7-6s7 2.5 7 6"/><path d="m16 11 2 2 4-4"/></svg>
          <span>Petugas UPF</span>
        </label>
        <label for="r-adm" class="tab">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-1.8-.3 1.7 1.7 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.1a1.7 1.7 0 0 0-1.1-1.5 1.7 1.7 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0 .3-1.8 1.7 1.7 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.1a1.7 1.7 0 0 0 1.5-1.1 1.7 1.7 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.7 1.7 0 0 0 1.8.3H9a1.7 1.7 0 0 0 1-1.5V3a2 2 0 1 1 4 0v.1a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.7 1.7 0 0 0-.3 1.8V9a1.7 1.7 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.1a1.7 1.7 0 0 0-1.5 1Z"/></svg>
          <span>Admin</span>
        </label>
      </div>

      <div class="card">
        <div class="group g-mhs">
          <label for="id-mhs">NIM / Akun Mahasiswa</label>
          <div class="input-wrap">
            <svg class="ico" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="11" r="2"/><path d="M6 16c.5-1.5 2-2 3-2s2.5.5 3 2M15 10h3M15 14h3"/></svg>
            <input id="id-mhs" name="akun_mahasiswa" type="text" placeholder="misal: 21060120140001@ui.ac.id" autocomplete="username">
          </div>
        </div>

        <div class="group g-upf">
          <label for="id-upf">ID Petugas UPF / Email</label>
          <div class="input-wrap">
            <svg class="ico" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="11" r="2"/><path d="M6 16c.5-1.5 2-2 3-2s2.5.5 3 2M15 10h3M15 14h3"/></svg>
            <input id="id-upf" name="akun_upf" type="text" placeholder="misal: upf.petugas01@ui.ac.id" autocomplete="username">
          </div>
        </div>

        <div class="group g-adm">
          <label for="id-adm">Username / Email Admin</label>
          <div class="input-wrap">
            <svg class="ico" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="9" cy="11" r="2"/><path d="M6 16c.5-1.5 2-2 3-2s2.5.5 3 2M15 10h3M15 14h3"/></svg>
            <input id="id-adm" name="akun_admin" type="text" placeholder="misal: admin@ui.ac.id" autocomplete="username">
          </div>
        </div>

        <div class="group">
          <label for="sandi">Kata Sandi</label>
          <div class="input-wrap">
            <svg class="ico" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 0 1 8 0v3"/></svg>
            <input class="sr" type="checkbox" id="lihat">
            <input id="sandi" class="pass" name="sandi" type="password" placeholder="Masukkan kata sandi akun" autocomplete="current-password" required>
            <label for="lihat" class="eye" title="Tampilkan / sembunyikan kata sandi">
              <svg class="eye-on" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/></svg>
              <svg class="eye-off" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17.9 17.9A10.4 10.4 0 0 1 12 19C5.5 19 2 12 2 12a18 18 0 0 1 4.1-5M9.9 5.2A9.7 9.7 0 0 1 12 5c6.5 0 10 7 10 7a18 18 0 0 1-2.2 3.2M3 3l18 18"/></svg>
            </label>
          </div>
        </div>

        <div class="row">
          <label class="check">
            <input type="checkbox" name="ingat">
            <span class="box"></span>
            Ingat saya
          </label>
          <a href="#lupa" class="link">Lupa Password?</a>
        </div>

        <button type="submit" class="btn">
          Masuk ke KampusCare
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </button>

        <p class="signup">Belum punya akun? <a href="#daftar" class="link">Daftar dulu</a></p>
      </div>
    </form>
  </section>
</main>

<!-- MODAL: Daftar akun baru -->
<div class="modal" id="daftar">
  <a href="#" class="backdrop" aria-label="Tutup"></a>
  <form class="dialog scroll" action="controllers/auth_process.php?action=register" method="POST">
    <a href="#" class="close" aria-label="Tutup">×</a>
    <h2>Buat Akun KampusCare</h2>
    <p>Isi data di bawah untuk mendaftar. Akun Petugas UPF akan diverifikasi oleh Admin.</p>

    <div class="group">
      <label for="d-role">Daftar sebagai</label>
      <div class="input-wrap">
        <select id="d-role" name="daftar_sebagai">
          <option value="mahasiswa">Mahasiswa</option>
          <option value="upf">Petugas UPF</option>
        </select>
      </div>
    </div>

    <div class="group">
      <label for="d-nama">Nama Lengkap</label>
      <div class="input-wrap">
        <input id="d-nama" type="text" name="nama" placeholder="Nama sesuai identitas kampus" autocomplete="name" required>
      </div>
    </div>

    <div class="group">
      <label for="d-nim">NIM / ID Petugas</label>
      <div class="input-wrap">
        <input id="d-nim" type="text" name="nim" placeholder="misal: 2106012014001" required>
      </div>
    </div>

    <div class="group">
      <label for="d-email">Email Kampus</label>
      <div class="input-wrap">
        <input id="d-email" type="email" name="email" placeholder="nama@ui.ac.id" autocomplete="email" required>
      </div>
    </div>

    <div class="group">
      <label for="d-sandi">Kata Sandi</label>
      <div class="input-wrap">
        <input class="sr" type="checkbox" id="lihat2">
        <input id="d-sandi" class="pass" type="password" name="sandi_baru" placeholder="Minimal 8 karakter" pattern=".{8,}" title="Minimal 8 karakter" autocomplete="new-password" required>
        <label for="lihat2" class="eye" title="Tampilkan / sembunyikan kata sandi">
          <svg class="eye-on" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/></svg>
          <svg class="eye-off" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17.9 17.9A10.4 10.4 0 0 1 12 19C5.5 19 2 12 2 12a18 18 0 0 1-2.2 3.2M3 3l18 18"/></svg>
        </label>
      </div>
    </div>

    <label class="check terms">
      <input type="checkbox" name="setuju" required>
      <span class="box"></span>
      Saya menyetujui ketentuan penggunaan KampusCare
    </label>

    <div class="dialog-actions">
      <a href="#" class="btn ghost">Batal</a>
      <button type="submit" class="btn">Daftar</button>
    </div>
    <p class="signup">Sudah punya akun? <a href="#" class="link">Masuk</a></p>
  </form>
</div>

<!-- MODAL: Pendaftaran berhasil -->
<div class="modal" id="daftar-berhasil">
  <a href="#" class="backdrop" aria-label="Tutup"></a>
  <div class="dialog center">
    <div class="ok">✓</div>
    <h2>Pendaftaran Berhasil</h2>
    <p>Akun kamu telah dibuat. Silakan masuk menggunakan NIM/ID dan kata sandi baru.</p>
    <a href="#" class="btn">Masuk Sekarang</a>
  </div>
</div>

<!-- MODAL: Lupa Password -->
<div class="modal" id="lupa">
  <a href="#" class="backdrop" aria-label="Tutup"></a>
  <form class="dialog" action="controllers/auth_process.php?action=forgot_password" method="POST">
    <h2>Lupa Kata Sandi</h2>
    <p>Masukkan email kampus kamu. Tautan untuk mengatur ulang kata sandi akan dikirim ke sana.</p>
    <div class="input-wrap">
      <input type="email" name="email_reset" placeholder="nama@ui.ac.id" required>
    </div>
    <div class="dialog-actions">
      <a href="#" class="btn ghost">Batal</a>
      <button type="submit" class="btn">Kirim Tautan</button>
    </div>
  </form>
</div>

</body>
</html>