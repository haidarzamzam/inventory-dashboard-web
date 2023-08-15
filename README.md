# Inventory Dashboard Web

### Langkah Instalasi

1. Clone atau download kode dari repositori ini dengan perintah<br>
`git clone https://github.com/haidarzamzam/inventory-dashboard-web.git`
2. Masuk ke direktori project<br>
`cd inventory-dashboard-web`
3. Copy file `.env.example`, rename menjadi `.env`
4. Atur konfigurasi database pada file `.env`<br>
`DB_DATABASE=inventory`<br>
`DB_USERNAME=root`<br>
`DB_PASSWORD=root`<br>
*sesuaikan username dan password dengan mysql di perangkat yang digunakan
5. Buat database dengan nama `inventory`
6. Pastikan beberapa CLI yang dibutuhkan telah terinstall, yaitu composer, php, dan npm
7. Jalankan perintah berikut untuk install package php yang dibutuhkan<br>
`composer install`
8. Jalankan migration untuk membuat tabel di database<br>
`php artisan migrate`
9. Jalankan seeder untuk mengisi database dengan data user, role, permission, dan data lain (dummy)<br>
`php artisan db:seed`
10. Install package node yang dibutuhkan<br>
`npm install`
11. Generate laravel app key
`php artisan key:generate`
12. Jalankan web server project laravel
`php artisan serve`
13. Karena memakai vite dari penggunaan breeze, maka perlu untuk menjalankan perintah berikut untuk build asset (buka terminal baru, biarkan web server diatas tetap berjalan)<br>
`npm run dev`
14. Buka url web pada browser sesuai dengan url pada hasil perintah langkah 9 diatas (umumnya http://127.0.0.1:8000)
15. Halaman login akan terbuka, isi email dan password dengan kredensial berikut:<br><br>
**Admin**<br>
email: adminhaidar@mailinator.com<br>
password: admin123<br><br>
**Super Admin**<br>
email: sadminhaidar@mailinator.com<br>
password: sadmin123<br><br>
