# CleanWash — Laravel 11

Project ini dibuat berdasarkan Blueprint CleanWash Update: pelayanan pelanggan langsung tanpa login, pelanggan online opsional, admin/petugas internal, transaksi, status laundry, pembayaran, pengaduan publik, dan laporan.

## Instalasi di Laragon
1. Extract folder `CleanWash` ke `C:\laragon\www\CleanWash`.
2. Buka Terminal/PowerShell:
   ```powershell
   cd C:\laragon\www\CleanWash
   composer install
   copy .env.example .env
   php artisan key:generate
   ```
3. Buat database MySQL bernama `cleanwash`.
4. Jalankan:
   ```powershell
   php artisan migrate --seed
   php artisan serve
   ```
5. Buka `http://127.0.0.1:8000` atau konfigurasi virtual host Laragon `http://cleanwash.test`.

## Login awal
Email: `admin@cleanwash.test`
Password: `password`

Segera ganti password setelah instalasi pada implementasi produksi.
