# Aplikasi Blog - CMS & Portal Berita (Ujian Akhir Semester)

Informasi Mahasiswa:
- **Nama Lengkap**: M. IKHWAN FAHMI
- **NIM**: 240605110116
- **Mata Kuliah**: Pemrograman Web
- **Dosen Pengampu**: A’la Syauqi M.Kom.

---

## Deskripsi Singkat Aplikasi
**Aplikasi Blog** adalah sebuah web portal berita/blog terintegrasi dengan Sistem Manajemen Konten (CMS) yang dibangun menggunakan framework **Laravel 12** dan styling modern menggunakan **Tailwind CSS v4**. 

Aplikasi ini memiliki dua area utama:
1. **Halaman Publik (Pengunjung)**:
   - Menampilkan 5 artikel terbaru dengan tata letak clean dan responsive.
   - Fitur filter artikel berdasarkan kategori yang dinamis di bagian widget samping.
   - Halaman detail artikel yang menampilkan artikel lengkap beserta daftar artikel terkait dengan kategori yang sama di panel samping.
2. **Halaman CMS (Administrator/Penulis)**:
   - Proteksi otentikasi (login/logout).
   - CRUD Penulis (mengelola data penulis blog).
   - CRUD Kategori (mengelola kategori artikel).
   - CRUD Artikel (mengelola postingan artikel baru beserta upload gambar, memperbarui, dan menghapus artikel).

---

## Video Demonstrasi
Tautan video demonstrasi aplikasi di YouTube:
👉 [Video Demo Aplikasi - YouTube](https://youtu.be/OIzdsZ7pGfE)

---

## Langkah-langkah Menjalankan Aplikasi Secara Lokal

Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini di komputer lokal Anda:

### 1. Prasyarat (Prerequisites)
Pastikan komputer Anda sudah terinstal:
- PHP (minimal versi 8.2)
- Composer
- Node.js & npm
- Database server (MySQL/MariaDB, seperti XAMPP atau Laragon)

### 2. Kloning Repositori
Kloning repositori ini ke direktori lokal Anda (misal di folder `htdocs` XAMPP):
```bash
git clone <url-repositori-anda>
cd aplikasi-blog
```

### 3. Instalasi Dependency PHP & Frontend
Jalankan perintah berikut untuk menginstal package yang diperlukan:
```bash
composer install
npm install
```

### 4. Konfigurasi Environment File
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
Buka file `.env` yang baru dibuat, lalu sesuaikan konfigurasi database Anda. Contoh untuk MySQL di XAMPP:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306 # Sesuaikan dengan port MySQL Anda (misal 3306 atau 3308)
DB_DATABASE=db_blog
DB_USERNAME=root
DB_PASSWORD=
```
*Catatan: Buat database kosong bernama `db_blog` di MySQL server Anda sebelum melanjutkan.*

### 5. Generate Application Key
Jalankan perintah berikut untuk membuat application key baru:
```bash
php artisan key:generate
```

### 6. Migrasi & Seeding Database
Jalankan migrasi untuk membuat tabel-tabel database beserta seed data awal:
```bash
php artisan migrate --seed
```
*Catatan: Seeding database akan otomatis membuat akun pengujian default:*
- **Email**: `test@example.com`
- **Password**: `password`

### 7. Hubungkan Storage Link
Lakukan link folder storage agar gambar artikel yang diunggah dapat diakses secara publik:
```bash
php artisan storage:link
```

### 8. Jalankan Server Lokal & Build Asset
Jalankan server lokal Laravel dan compiler Vite untuk compile Tailwind CSS:

*Terminal 1 - Jalankan Server Laravel:*
```bash
php artisan serve
```

*Terminal 2 - Jalankan Vite Development Server:*
```bash
npm run dev
```

Aplikasi sekarang dapat diakses melalui browser Anda di alamat: [http://127.0.0.1:8000](http://127.0.0.1:8000)
Untuk masuk ke dashboard CMS, silakan akses halaman login di [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login) dan gunakan kredensial test user di atas.
