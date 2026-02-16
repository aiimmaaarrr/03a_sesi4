# Praktikum Pemrograman Web Lanjut - Sesi 4 03a

Repositori ini berisi hasil praktikum mengenai implementasi **CRUD (Create, Read, Update, Delete)** dan **Relasi Tabel (One-to-Many)** menggunakan Framework Laravel 11. Proyek ini fokus pada pengelolaan data Mata Kuliah serta relasinya dengan data Mahasiswa.

## 🚀 Fitur Utama
- **CRUD Mata Kuliah**: Pengelolaan data MK (Kode, Nama, SKS).
- **Relasi Eloquent**: Menggunakan `hasMany` untuk menghubungkan Mata Kuliah dengan Mahasiswa.
- **Tugas Mandiri**: Fitur daftar peminat yang menampilkan mahasiswa per-mata kuliah.
- **Validasi Data**: Validasi input unik pada `kode_mk`.

---

## 📊 Skema Database & Alur Relasi (ERD)



### Alur Relasi:
Berdasarkan bantuan AI, alur relasi dibangun menggunakan metode **One-to-Many**:
1. **Model Matakuliah**: Memiliki fungsi `hasMany(Mahasiswa::class)`, artinya satu MK bisa diambil oleh banyak mahasiswa.
2. **Model Mahasiswa**: Memiliki fungsi `belongsTo(Matakuliah::class)` yang merujuk pada `matakuliah_id` sebagai Foreign Key.
3. **Alur Kerja**: Data mahasiswa dipanggil menggunakan *Eager Loading* `with('mahasiswas')` pada controller untuk ditampilkan saat user mengklik tombol detail.

---

## 📸 Cuplikan Layar (Screenshots)

### 1. Daftar Mata Kuliah (Index)
Menampilkan tabel mata kuliah dengan tombol aksi dan fitur "Lihat Mahasiswa".
<img width="1919" height="385" alt="image" src="https://github.com/user-attachments/assets/aada1e7a-7568-4b0a-8b64-c3012bcb281e" />

### 2. Detail Peminat (Tugas Mandiri 2)
Halaman yang muncul saat tombol diklik, menampilkan siapa saja mahasiswa yang mengambil MK tersebut menggunakan relasi `hasMany`.
<img width="1919" height="672" alt="image" src="https://github.com/user-attachments/assets/d8ffae7f-3204-49a4-80c5-c940b46af595" />

### 3. Tambah & Edit Data
Form input mata kuliah yang sudah disesuaikan dengan skema database terbaru (tanpa kolom semester).
<img width="1919" height="608" alt="image" src="https://github.com/user-attachments/assets/ecffbc8c-8cf1-4f6c-bad6-c0dbde632961" />

---

## 🛠️ Teknologi yang Digunakan
- **Framework:** Laravel 11
- **Database:** MySQL
- **Frontend:** Bootstrap 5
- **Konsep:** Eloquent Relationships (One-to-Many)

## 📝 Cara Menjalankan Secara Lokal
1. Clone repositori ini.
2. Jalankan `composer install`.
3. Salin file `.env.example` menjadi `.env` dan atur konfigurasi database.
4. Jalankan `php artisan migrate`.
5. Jalankan `php artisan serve`.

---
**Disusun oleh:** Aimar Trophy Sudrajat - 43240335
