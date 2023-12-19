# Smart Hotel App

Selamat datang di repositori GitHub untuk Smart Hotel App. Project ini merupakan web application sederhana untuk melakukan reservasi kamar hotel. Project ini dibangun dengan maksud melakukan integrasi Aplikasi booking hotel dengan aplikasi booking travel dalam tugas besar mata kuliah Teknologi Sistem Terintegrasi. 

### Aplikasi web ini dibuat oleh Kelompok 23 K01. Berikut adalah anggota kelompok kami :

```
1. I Dewa Made Manu Pradnyana - 18221047
2. Timothy Subekti - 18221063
3. Rahman Satya - 18221117

```


## Fitur

### Customer

- **Login** : Akses yang aman dan terenkripsi untuk setiap Customer, memastikan privasi dan keamanan data.

- **Reservasi Kamar Hotel** : Customer dapat melakukan reservasi kamar hotel berdasarkan lokasi yang dipilih, jumlah kamar, tanggal menginap, dan durasinya

- **Melihat Daftar Lokasi Hotel** : Daftar lengkap lokasi hotel yang tersedia dengan informasi rinci untuk membantu Customer membuat pilihan yang tepat.

- **Melihat Riwayat Reservasi Kamar Hotel** : Akses cepat ke riwayat pembelian memberikan customer informasi lengkap tentang pesanan sebelumnya.

### Pihak Admin

- **Melihat Jumlah Reservasi setiap Lokasi** : Admin dapat melihat jumlah reservasi yang dibuat di setiap lokasi hotel

- **Melihat Data Lokasi Hotel** : Admin dapat melihat seluruh lokasi hotel

- **Menambahkan Lokasi Hotel** : Admin dapat menambahkan lokasi hotel dengan mudah, memastikan bahwa daftar selalu terkini dan relevan.

- **Mengedit Lokasi Hotel** : Admin dapat mengedit deskripsi dan harga setiap lokasi hotel dengan mudah, memastikan bahwa daftar selalu terkini dan relevan.

- **Menghapus Lokasi Hotel** : Admin dapat menghapus lokasi hotel dengan mudah, memastikan bahwa daftar selalu terkini dan relevan.

- **Rekomendasi Lokasi Hotel Baru** : Menggunakan informasi destinasi yang paling sering dikunjungi dari website booking travel untuk menentukan lokasi hotel baru

- **Melihat Data Order Travel**: Admin dapat melihat data booking travel melalui API sistem travel
  
## Tech Stack

**Framework :** CodeIgniter 4

**Web Server :** XAMPP

**Database :** MySQL

**Testing Tools :** Postman

## Prasyarat

Sebelum memulai, pastikan Anda telah mendownload beberapa tools berikut ini:

- **XAMPP** : Pastikan Anda telah menginstal XAMPP untuk menyediakan lingkungan pengembangan lokal yang mencakup Apache, MySQL, PHP, dan Perl.
- **Composer** : Composer digunakan untuk mengelola dependensi PHP pada proyek. Pastikan Anda telah menginstal Composer sebelum melanjutkan dengan instalasi.

Untuk prasyatar ini anda dapat menggunakan referensi video berikut ini [Instalasi CodeIgniter 4](https://youtu.be/UhpzEne6omo?si=RTYhK_HoLrGbvm8f).

## Instalasi

Berikut adalah petunjuk instalasi program untuk menjalankan service pada mesin lokal

Pertama-tama, Anda perlu mengkloning proyek ini atau **mengunduh file**

```bash
  git clone https://github.com/rhmn5ty/Tubes-TST-Sistem-Hotel
```

Pindah ke direktori proyek

```bash
  cd Path/to/Tubes-TST-Sistem-Hotel
```

Kemudian install semua dependensi dengan menjalankan kode ini pada terminal

```bash
  composer install
```

Selanjutnya, nyalakan XAMPP anda, Start Apache dan MySQL. 

![xampp control panel](https://res.cloudinary.com/djkckue0o/image/upload/v1702023164/README%20LSTI/dznhrgrwtsgopfm1g20o.png)

Lalu buka php myadmin melalui url "localhost:XXXX" dengan (XXXX) sebagai Port dari Apache. Dalam contoh gambar saya diatas maka saya akan memasukan url "localhost:8040" ke website. Kemudian setelah muncul welcome page XAMPP, klik menu phpMyAdmin pada top navbarnya. Kemudian buatlah sebuah database bernama **hotel_system**.

Selanjutnya, Donwload ENV file pada link gdrive berikut dan masukan kedalam root directory Project.

Link ENV File : https://drive.google.com/drive/folders/18yDcRzLhskIMXgjkjQRytNWWvNAVbQIB

Selanjutnya, jalankan command migrasi di bawah ini untuk membuat tabel pada database

```bash
  php spark migrate
```


Kemudian jalan kan command ini pada terminal untuk mengisi initial data pada tabel (seeding)
```bash
   php spark db:seed DbSeeder
```

Selanjutnya, ketik command di bawah ini untuk menjalankan server

```bash
  php spark serve
```

Sekarang anda bisa mengakses layanan backend Smart Hotel melalui server http://localhost:8080/

#### NOTE
Jika Mengalami Kendala tidak bisa terkonek ke database, maka git Clone project Tubes-TST-Sistem-Hotel ke dalam folder htdocs dengan path C:\xampp\htdocs

Error Yang mungkin terjadi adalah Port Conflict. berikut adalah link referensinya https://www.inforbiro.com/blog/how-to-change-xampp-apache-port

## Referensi API

Berikut adalah panduan API untuk Layanan Backend Smart Hotel

https://drive.google.com/file/d/10Qn4S_46_1tKbfoCjGt5t7gLuZQGJ2Ux/view?usp=sharing


## Test dengan POSTMAN

Berikut adalah panduan untuk melakukan testing API dengan POSTMAN

**LINK POSTMAN COLLECTION :**  https://drive.google.com/drive/folders/1A1phllG9e18wfYhf5OOoy_7OQERQdT0b?usp=drive_link

## Deployment

**Smart Hotel :** https://smart-hotel-sisterin.000webhostapp.com/

**Smart Travel :** https://smart-travel-app.000webhostapp.com/


## Appendix

**Dokument Kelompok 23 :** https://drive.google.com/file/d/10Qn4S_46_1tKbfoCjGt5t7gLuZQGJ2Ux/view?usp=sharing

