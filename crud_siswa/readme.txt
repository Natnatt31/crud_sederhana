

## Deskripsi
Aplikasi web sederhana berbasis CRUD (Create, Read, Update, Delete) untuk mengelola data siswa. Dibangun menggunakan PHP native untuk backend, HTML/CSS/JS untuk frontend, dan MySQL untuk database. Aplikasi berjalan lokal dengan Laragon (Apache dan MySQL). Tampilan minimalis, rapi, dan responsive.

## Fitur-Fitur
- Create (Tambah Siswa): Form untuk menambah data siswa baru dengan validasi (nama, NIS, email wajib diisi). NIS unik sebagai primary key.
- Read (Tampilkan Data): Tabel daftar siswa dengan kolom NIS, Nama, Kelas, Alamat, Tanggal Lahir, Jenis Kelamin, Email, Jurusan.
- Update (Edit Siswa): Form edit data siswa berdasarkan NIS (NIS readonly saat edit).
- Delete (Hapus Siswa): Hapus data siswa dengan konfirmasi alert.
- Validasi Form: Alert untuk input wajib dan konfirmasi aksi (simpan, update, hapus).
- Dropdown Select: Kelas (X, XI, XII) dan Jurusan (DKV, PPLG, TJKT, BD) menggunakan select untuk pilihan tetap.
- Responsive: Tampilan lebar (full screen-friendly) dengan scroll horizontal jika tabel terlalu besar.
- Database: Tabel `siswa` dengan 8 kolom (NIS primary key, nama, kelas, alamat, tanggal_lahir, jenis_kelamin, email, jurusan).

## Persyaratan Sistem
- Laragon (untuk Apache dan MySQL).
- Browser web (Chrome, Firefox, dll.).
- VSCode (opsional, untuk edit kode).
- File zip berisi source code dan file SQL database.

## Langkah-Langkah Penggunaan

### 1. Ekstrak Zip File
- Download file zip yang berisi source code dan file database (misalnya `crud_siswa.zip`).
- Ekstrak zip ke folder `C:\laragon\www\` (atau folder www Laragon Anda).
- Hasil ekstrak: Folder `crud_siswa\` dengan file-file seperti `index.php`, `add.php`, dll., dan file SQL (misalnya `sekolah.sql`).

### 2. Menyalakan MySQL
- Buka aplikasi Laragon.
- Klik tombol Start untuk Apache dan MySQL (ikon harus hijau).
- Pastikan MySQL berjalan (versi 8.4.3-winx64 atau sesuai).

### 3. Import Database ke phpMyAdmin
- Buka browser dan akses `http://localhost/phpmyadmin`.
- Login dengan username `root` dan password kosong (default Laragon).
- Klik "New" di sidebar kiri untuk buat database baru bernama `sekolah`.
- Klik database `sekolah` > Tab "Import".
- Pilih file SQL dari zip (misalnya `sekolah.sql`) > Klik "Go".
- Database `sekolah` dengan tabel `siswa` akan ter-import (jika belum ada, buat tabel manual dengan query dari kode sebelumnya).

### 4. Membuka Folder Source Code di VSCode
- Buka VSCode.
- Klik "File" > "Open Folder" > Pilih folder `C:\laragon\www\crud_siswa\`.
- Folder akan terbuka di VSCode. Anda bisa edit file seperti `index.php`, `style.css`, dll., jika perlu.

### 5. Membuka index.php di Browser
- Buka browser dan akses `http://localhost/crud_siswa/index.php`.
- Halaman utama akan muncul dengan daftar siswa (jika ada data).
- Klik "Tambah Siswa" untuk create, "Edit" untuk update, "Hapus" untuk delete.
- Pastikan semua aksi berfungsi dengan konfirmasi alert.

