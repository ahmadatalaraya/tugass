

```markdown
# SIGAP - Sistem Informasi Gangguan dan Permohonan TIK Kementerian Agama

Selamat datang di SIGAP, aplikasi yang dirancang untuk mempermudah pengelolaan gangguan dan permohonan layanan TIK di lingkungan Kementerian Agama. Aplikasi ini memungkinkan pengguna untuk mengajukan permohonan layanan, melacak status pengajuan, dan mendapatkan panduan dalam format PDF.

## Fitur Utama

- **Dashboard Interaktif**: Tersedia untuk berbagai peran pengguna seperti Admin, SuperAdmin, dan User. Setiap dashboard menampilkan informasi yang relevan dan statistik terkini.
- **Pengelolaan Pengajuan**: Pengguna dapat membuat, melihat, dan mengelola pengajuan layanan dengan mudah. Admin dan SuperAdmin dapat menyetujui atau menolak pengajuan.
- **Panduan PDF**: Akses panduan dalam format PDF langsung dari aplikasi untuk memudahkan pengguna dalam memahami proses dan layanan yang tersedia.
- **Notifikasi Real-time**: Dapatkan notifikasi langsung mengenai status pengajuan Anda.

## Teknologi yang Digunakan

- **Framework**: CodeIgniter 4
- **Bahasa Pemrograman**: PHP 8.1
- **Database**: MySQL
- **Frontend**: Bootstrap 4.5.2

## Instalasi

1. Clone repositori ini ke dalam direktori lokal Anda.
2. Jalankan `composer install` untuk menginstal dependensi yang diperlukan.
3. Konfigurasikan database Anda di file `.env` atau `app/Config/Database.php`.
4. Jalankan migrasi database dengan perintah `php spark migrate`.
5. Mulai server lokal dengan perintah `php spark serve`.

## Pengujian

Untuk menjalankan pengujian, gunakan perintah berikut:

```bash
./phpunit
```

Pastikan Anda telah menginstal PHPUnit dan XDebug untuk mendapatkan laporan cakupan kode.

## Kontribusi

Kami menyambut kontribusi dari siapa pun yang tertarik untuk meningkatkan aplikasi ini. Silakan buat pull request atau buka issue untuk diskusi lebih lanjut.

## Lisensi

Aplikasi ini dilisensikan di bawah lisensi MIT. Lihat file `LICENSE` untuk informasi lebih lanjut.

## Kontak

Untuk pertanyaan lebih lanjut, silakan hubungi tim pengembang kami melalui email: support@kemenag.go.id.

```

README ini dirancang untuk memberikan gambaran yang jelas dan menarik tentang aplikasi, fitur-fiturnya, serta cara menginstal dan menguji aplikasi tersebut.