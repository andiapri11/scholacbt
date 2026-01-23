# Schola CBT

**Schola CBT** (Computer Based Test) adalah aplikasi ujian online berbasis web yang modern, aman, dan mudah digunakan. Aplikasi ini dirancang untuk memudahkan sekolah dalam melaksanakan ujian berbasis komputer (CBT) dengan fitur-fitur yang lengkap dan tampilan yang *user-friendly*, baik untuk siswa maupun guru.

<p align="center">
  <img src="assets/img/garuda.svg" alt="Schola CBT Logo" width="150" height="auto" />
</p>

---

## 🚀 Fitur Utama

### 🎓 Untuk Siswa
*   **Dashboard Modern**: Tampilan dashboard yang bersih, informatif, dan responsif (nyaman di HP/Tablet).
*   **Kalender Ujian**: Melihat jadwal ujian yang akan datang dalam format kalender yang rapi.
*   **Ujian Online**: Antarmuka ujian yang fokus, dengan dukungan berbagai tipe soal (Pilihan Ganda, Esai, Penjodohan, dll).
*   **Riwayat Nilai**: Akses cepat untuk melihat hasil dan riwayat ujian.

### 👨‍🏫 Untuk Guru & Admin
*   **Bank Soal**: Manajemen bank soal yang mudah (Import/Export Word/Excel).
*   **Manajemen Jadwal**: Mengatur jadwal ujian, sesi, dan ruang kelas dengan fleksibel.
*   **Monitoring Ujian**: Memantau status ujian siswa secara *real-time* (sedang mengerjakan, selesai, dll).
*   **Analisis Nilai**: Cetak hasil ujian, analisis butir soal, dan rekap nilai otomatis.
*   **Cetak Kartu**: Otomatisasi cetak kartu peserta dan daftar hadir.

---

## 🛠️ Teknologi

Aplikasi ini dibangun menggunakan teknologi web yang handal dan stabil:
*   **Backend**: PHP (CodeIgniter 3 Framework)
*   **Database**: MySQL
*   **Frontend**: HTML5, CSS3, JavaScript (jQuery), Bootstrap/AdminLTE
*   **Server**: Apache/Nginx

---

## 📦 Instalasi

### Persyaratan Server
*   PHP >= 7.6
*   MySQL >= 5.7
*   Web Server (Apache/Nginx)

### Cara Install
1.  **Clone Repository**
    ```bash
    git clone https://github.com/andiapri11/scholacbt.git
    ```
2.  **Konfigurasi Database**
    *   Buat database baru di MySQL (contoh: `cbt_db`).
    *   Import file database SQL (jika tersedia) atau biarkan aplikasi melakukan migrasi awal.
    *   Sesuaikan konfigurasi di `application/config/database.php`:
        ```php
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => 'password_anda',
        'database' => 'cbt_db',
        ```
3.  **Konfigurasi Base URL**
    *   Buka `application/config/config.php` dan pastikan `base_url` sudah sesuai. Aplikasi ini sudah dikonfigurasi untuk mendeteksi URL secara otomatis.
4.  **Akses Aplikasi**
    *   Buka browser dan akses `http://localhost/scholacbt` (sesuaikan dengan path instalasi Anda).

---

## 🔐 Akun Default

*   **Administrator**:
    *   Username: `admin`
    *   Password: `password` (atau sesuai yang di-set saat instalasi awal)

---

## 📄 Lisensi

Schola CBT dikembangkan untuk tujuan pendidikan. Silakan gunakan dan kembangkan sesuai kebutuhan institusi Anda.

---
*Dibuat dengan ❤️ untuk Pendidikan Indonesia.*
