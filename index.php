<?php
require_once __DIR__ . '/helpers/auth.php';

// Cek apakah user sudah login. Jika belum, otomatis dilempar ke login.php
checkAuth();
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CampusCare — Portal Mahasiswa</title>
  <link rel="stylesheet" href="resources/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
  <header class="topbar">
    <div class="topbar-inner">
      <a class="brand" href="#">
        <span class="brand-icon">▦</span>
        <span><strong>CampusCare <small>RESMI</small></strong><em>Sistem Resmi Universitas Terpadu</em></span>
      </a>
      <nav class="main-nav">
        <a class="active" href="#">Beranda</a><a href="resources/views/buat-pengaduan.html">Buat Pengaduan</a><a href="resources/views/riwayat-pengaduan.html">Riwayat Pengaduan</a><a href="resources/views/panduan-fasilitas.html">Panduan Fasilitas</a>
      </nav>
      <div class="top-actions"><button class="search">⌕ <span>Cari ID</span></button><button class="icon-button" aria-label="Notifikasi">♧<i></i></button><div class="profile"><b>Dimas Arya Pratama</b><span>NIM 2108561042 • Aktif</span></div><span class="avatar">♟</span></div>
    </div>
  </header>

  <main class="page">
    <section class="welcome panel">
      <div>
        <div class="eyebrow"><span>PORTAL MAHASISWA TERPADU</span><b>•</b> Tahun Akademik 2024/2025 Genap</div>
        <h1>Halo, Dimas Arya Pratama!</h1>
        <div class="student-meta"><span>♙ &nbsp; NIM: <b>2108561042</b></span><span>◇ &nbsp; S1 Teknik Informatika (Semester 6)</span></div>
        <p class="status-line"><i></i> Status: Mahasiswa Aktif</p>
      </div>
      <div class="welcome-actions">
        <button class="button soft" onclick="window.location.href='resources/views/panduan-fasilitas.html'">▤ &nbsp; Lihat Panduan Fasilitas</button>
        <button class="button primary" onclick="window.location.href='resources/views/buat-pengaduan.html'">⊕ &nbsp; Buat Pengaduan Fasilitas Baru</button>
      </div>
    </section>

    <section class="stats">
      <article class="stat panel"><div><label>TOTAL PENGADUAN</label><strong>10</strong><small>Sejak September 2024</small></div><span class="stat-icon">▤</span></article>
      <article class="stat panel"><div><label>MENUNGGU VERIFIKASI</label><strong>2</strong><small class="tag">Triage Admin UPF</small></div><span class="stat-icon">▣</span></article>
      <article class="stat panel"><div><label>SEDANG DIKERJAKAN</label><strong class="blue">1</strong><small class="tag">Teknisi di Lapangan</small></div><span class="stat-icon">♧</span></article>
      <article class="stat panel"><div><label>SELESAI DITANGANI</label><strong>7</strong><small class="tag">Tervalidasi 100%</small></div><span class="stat-icon pale">✓</span></article>
    </section>

    <section class="active-ticket panel">
      <div class="section-banner"><strong><i></i> PENGADUAN AKTIF SEDANG DITANGANI TEKNISI</strong><span>SLA Target Penanganan: <b>Hari Ini, 16:00 WIB</b></span></div>
      <div class="active-grid">
        <div class="ticket-preview">
          <div class="photo-wrap"><img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=900&q=80" alt="Ruang kelas dan fasilitas pendingin"><span>Bukti Awal Pelapor</span></div>
          <div class="ticket-info"><div class="ticket-id">TIKET ID <b>#KC-2025-0418</b></div><h2>AC Ruang Kuliah 302 Gedung B Bocor &amp; Menetes ke Kursi Mahasiswa</h2><div class="chips"><span>❄ HVAC &amp; Pendingin</span><span>⌖ Gedung B • Lt. 3 • R.302</span></div></div>
        </div>
        <div class="progress-area">
          <h3>Status Progres Penanganan:</h3>
          <div class="timeline">
            <div class="step done"><span>✓</span><b>Terkirim</b><small>08:15 WIB</small></div>
            <div class="step done"><span>✓</span><b>Verifikasi Admin</b><small>08:40 WIB</small></div>
            <div class="step done"><span>✓</span><b>Ditugaskan</b><small>09:10 WIB</small></div>
            <div class="step current"><span>⟳</span><b>Sedang Diperbaiki</b><small>Dalam Pengerjaan</small></div>
            <div class="step future"><span>✓</span><b>Validasi Selesai</b><small>Estimasi 16:00</small></div>
          </div>
          <div class="technician"><span class="tool-icon">⚒</span><div class="tech-copy"><b>Pak Joko Susilo <span class="tag">Teknisi Madya</span></b><small>Unit Pengelola Fasilitas (UPF) Divisi Elektrikal &amp; HVAC Kampus</small></div><div class="tech-actions"><button class="button white">☎ Hubungi Teknisi</button><button class="button primary">▣ Kirim Pesan</button></div></div>
        </div>
      </div>
    </section>

    <div class="dashboard-grid">
      <section class="recent panel">
        <div class="section-heading"><div><h2>Daftar Pengaduan Terkini</h2><p>Kelola dan pantau seluruh tiket laporan yang Anda ajukan</p></div><div class="tabs"><button class="selected" data-filter="all">Semua (10)</button><button data-filter="pending">Pending (2)</button><button data-filter="progress">In Progress (1)</button><button data-filter="done">Selesai (7)</button></div></div>
        <div class="table-scroll"><table><thead><tr><th>ID TIKET &amp; WAKTU</th><th>KATEGORI &amp; FASILITAS</th><th>LOKASI</th><th>BUKTI</th><th>STATUS</th><th>TEKNISI</th><th>AKSI</th></tr></thead><tbody id="ticketRows">
          <tr data-status="progress"><td><a>#KC-2025-0418</a><small>Hari ini,<br>08:15 WIB</small></td><td><b>AC Split R.302 Bocor</b><small>HVAC &amp; Listrik</small></td><td>Gedung B, Lt. 3<small>Ruang Kuliah 302</small></td><td><img class="thumb" src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=120&q=70" alt="Bukti AC"></td><td><span class="pill progress">In Progress</span></td><td>Pak Joko S.<small>Div. HVAC</small></td><td><button class="mini-button" data-detail="KC-2025-0418">Detail</button></td></tr>
          <tr data-status="pending"><td><a>#KC-2025-0412</a><small>Kemarin,<br>14:20 WIB</small></td><td><b>Proyektor HDMI Rusak</b><small>Multimedia Audio Visual</small></td><td>Gedung D, Lt. 1<small>Lab Rekayasa Perangkat Lunak</small></td><td><img class="thumb" src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=120&q=70" alt="Bukti proyektor"></td><td><span class="pill pending">Pending</span></td><td><em>Belum ditugaskan</em></td><td><button class="mini-button" data-detail="KC-2025-0412">Detail</button></td></tr>
          <tr data-status="pending"><td><a>#KC-2025-0409</a><small>24 Feb 2025,<br>10:05</small></td><td><b>Kran Wastafel Toilet Patah</b><small>Plumbing &amp; Sanitasi</small></td><td>Gedung B, Lt. 2<small>Toilet Pria Sayap Barat</small></td><td><img class="thumb" src="https://images.unsplash.com/photo-1620626011761-996317b8d101?auto=format&fit=crop&w=120&q=70" alt="Bukti wastafel"></td><td><span class="pill pending">Pending</span></td><td><em>Belum ditugaskan</em></td><td><button class="mini-button" data-detail="KC-2025-0409">Detail</button></td></tr>
          <tr data-status="done"><td><a>#KC-2025-0391</a><small>20 Feb 2025,<br>09:30</small></td><td><b>Stop Kontak Meja Meleleh</b><small>Kelistrikan</small></td><td>Gedung Perpustakaan<small>Ruang Baca Bersama Lt.1</small></td><td><img class="thumb" src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=120&q=70" alt="Bukti stop kontak"></td><td><span class="pill done">Selesai</span></td><td>Pak Bambang<small>Div. Elektrikal</small></td><td><button class="mini-button primary-mini" data-detail="KC-2025-0391">Beri Nilai</button></td></tr>
          <tr data-status="done"><td><a>#KC-2025-0380</a><small>15 Feb 2025,<br>11:15</small></td><td><b>Kaca Jendela Retak</b><small>Struktur Gedung</small></td><td>Gedung B, Lt. 1<small>Lorong Timur Dekat Tangga</small></td><td><img class="thumb" src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=120&q=70" alt="Bukti jendela"></td><td><span class="pill done">Selesai</span></td><td>Pak Agus T.<small>Div. Sipil</small></td><td>★ <small>5.0 Dinilai</small></td></tr>
        </tbody></table></div>
        <div class="table-footer"><span>Menampilkan <b id="visibleCount">5</b> dari 10 total tiket pengaduan</span><div><button class="page-button">Sebelumnya</button><button class="page-button active-page">1</button><button class="page-button">2</button><button class="page-button">Selanjutnya</button></div></div>
      </section>

      <aside class="sidebar">
        <section class="panel side-panel"><div class="side-title"><h2>◷ Maintenance Terjadwal</h2><span class="tag">Pekan Ini</span></div><article class="maintenance"><div><b>27 FEB • 08:00 - 14:00 WIB</b><span>DSTI Server</span></div><h3>Lab Komputer Jaringan (Lab 4 &amp; 5)</h3><p>Upgrade switch backbone serat optik &amp; maintenance berkala kabel LAN.</p></article><article class="maintenance"><div><b>01 MAR • 13:00 - 17:00 WIB</b><span>UPF Elektrikal</span></div><h3>Lift Sayap Barat Gedung Rektorat</h3><p>Pemeriksaan sensor beban otomatis dan uji tali sling baja berkala.</p></article></section>
        <section class="panel side-panel"><div class="side-title"><h2>♧ Kontak Cepat &amp; Darurat</h2></div><p class="side-intro">Jika menemukan bahaya fisik mendesak (kebocoran gas lab, korsleting api, pipa jebol), segera kontak UPF Pusat:</p><a class="contact-card" href="https://wa.me/6281123456789"><span>▣</span><div><b>WhatsApp Pengaduan Cepat</b><small>0811-2345-6789 (24 Jam)</small></div><strong>→</strong></a><a class="contact-card emergency" href="tel:112"><span>☼</span><div><b>Call Center Siaga Darurat</b><small>Ext. 112 / 808 Kampus Pusat</small></div><strong>♧</strong></a></section>
        <section class="panel response"><h2>Indeks Responsivitas Kampus</h2><div class="response-data"><strong>96.4%</strong><div class="ring"><span>96%</span></div></div><p>Penyelesaian Sesuai SLA (&lt; 24 Jam)</p></section>
      </aside>
    </div>
  </main>

  <footer class="footer">
    <div class="footer-grid">
      <div><a class="brand footer-brand" href="#"><span class="brand-icon">▦</span><strong>CampusCare</strong></a><p>Kanal aspirasi &amp; pelaporan sarana prasarana resmi Universitas Terpadu untuk menunjang mutu proses akademik dan kenyamanan sivitas kampus.</p><span class="tag">Status Sistem: Normal (SLA 24 Jam)</span></div>
      <div><h3>Helpdesk DSTI</h3><p>Direktorat Sistem &amp; Teknologi Informasi</p><p>✉ &nbsp; helpdesk@terpadu.ac.id</p><p>☎ &nbsp; Ext. 1404 / (021) 7888-2300</p><p>◷ &nbsp; Senin - Jumat: 08.00 - 16.30 WIB</p></div>
      <div><h3>Unit Pengelola Fasilitas (UPF)</h3><p>Gedung Rektorat Sayap Timur, Lantai 1</p><p>⚒ &nbsp; Koordinator Teknisi Lapangan</p><p>☎ &nbsp; Hotline Darurat: 0811-2345-6789</p><p>▦ &nbsp; Ruang Kendali &amp; Workshop Sentral</p></div>
      <div><h3>Tautan Cepat</h3><p>Standar Layanan Operasional (SLA)</p><p>Peta Zonasi Fasilitas Kampus</p><p>Formulir Reservasi Laboratorium</p><p>Kebijakan Privasi &amp; Data Pelapor</p><p>Portal Mahasiswa Terintegrasi (SIMAK)</p></div>
    </div>
    <div class="copyright"><span>© 2025 Universitas Terpadu. Hak Cipta Dilindungi Undang-Undang. CampusCare v2.4.</span><span>Bantuan Penggunaan　 •　 Syarat Layanan　 •　 Lapor Kendala Teknis</span></div>
  </footer>
  <dialog id="detailDialog"><div class="dialog-head"><h2>Detail Pengaduan</h2><button id="closeDialog" aria-label="Tutup">✕</button></div><p id="detailText"></p><button class="button primary" id="okDialog">Tutup</button></dialog>
  <script src="script.js"></script>
</body>
</html>
