# Employee Management

Aplikasi Employee Management berbasis Laravel untuk mengelola data karyawan. Aplikasi ini menyediakan fitur autentikasi, dashboard, CRUD data karyawan, pencarian, pagination, serta integrasi dengan Public API Wilayah Indonesia.

---

## Teknologi

- Laravel 12
- PHP 8.3.27
- MySQL
- Bootstrap 5
- JavaScript (Fetch API)
- SweetAlert2
- Eloquent ORM

---

## Fitur

### Authentication

- Login
- Logout
- Password menggunakan bcrypt (Laravel Hash)

### Dashboard

- Total Karyawan
- Total User

### Data Karyawan

- Tambah Data
- Lihat Detail
- Edit Data
- Hapus Data
- Validasi Form
- Pencarian berdasarkan Nama dan NIK
- Pagination
- Pilihan jumlah data (10, 20, 50, 100)

### Wilayah Indonesia

Menggunakan Public API Wilayah Indonesia untuk mengambil data:

- Provinsi
- Kabupaten/Kota
- Kecamatan
- Desa/Kelurahan

Data nama wilayah juga disimpan ke database.

Jika API tidak dapat diakses, aplikasi akan menampilkan pesan yang informatif tanpa menyebabkan aplikasi crash.

---

## Struktur Database

### users

| Field      | Tipe             |
| ---------- | ---------------- |
| id         | bigint           |
| name       | varchar          |
| email      | varchar          |
| password   | varchar (bcrypt) |
| created_at | timestamp        |
| updated_at | timestamp        |

---

### employees

| Field          |
| -------------- |
| id             |
| nik            |
| nama_lengkap   |
| jenis_kelamin  |
| tempat_lahir   |
| tanggal_lahir  |
| no_telepon     |
| email          |
| jabatan        |
| tanggal_masuk  |
| provinsi_id    |
| provinsi_nama  |
| kabupaten_id   |
| kabupaten_nama |
| kecamatan_id   |
| kecamatan_nama |
| desa_id        |
| desa_nama      |
| alamat_detail  |
| created_at     |
| updated_at     |

---

## Instalasi

Clone repository

```bash
git clone https://github.com/username/employee-management.git
```

Masuk ke folder project

```bash
cd employee-management
```

Install dependency

```bash
composer install
```

Copy file environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Konfigurasi database pada file `.env`

```env
DB_DATABASE=employee_management
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migration

```bash
php artisan migrate
```

Jalankan seeder

```bash
php artisan db:seed
```

Atau

```bash
php artisan migrate:fresh --seed
```

Jalankan aplikasi

```bash
php artisan serve
```

---

## Akun Login

Contoh akun hasil seeder

Email

```
admin@example.com
```

Password

```
password
```

---

## Struktur Folder

```
app/
 ├── Http/
 │     └── Controllers.php
 |     └── AuthControler.php
 |     └── DashboardController.php
 |     └── EmployeeController.php
       └── WilayahController.php
 ├── Models/
 |     └── Employee.php
 |     └── User.pjp
database/
 ├── migrations/
 |     └── 0001_01_01_000000_create_users_table.php
 |     └── 0001_01_01_000001_create_cache_table.php
 |     └── 0001_01_01_000002_create_jobs_table.php
 |     └── 2026_07_30_121947_create_employees_table.php
 └── seeders/
 |     └── DatabaseSeeder.php
 |     └── UserSeeder.php
public/
 ├── js/
 |    └──  wilayah.js
resources/
 ├── views/
 |     └── auth/
 |     |      └── login.blade.php
 |     └── dashboard/
 |     |      └── index.blade.php
 |     └── employees
 |     |      └── index.balde.php
 |     |      └── create.balde.php
 |     |      └── edit.balde.php
 |     |      └── show.balde.php
 |     └── layouts
 |     |      └── app.blade.php
routes/
 ├──   └── web.php

```

---

## Eloquent ORM

Aplikasi menggunakan Eloquent ORM Laravel.

Contoh:

Menampilkan data

```php
Employee::latest()->paginate(10);
```

Menambah data

```php
Employee::create($data);
```

Mengubah data

```php
$employee->update($data);
```

Menghapus data

```php
$employee->delete();
```

---

## Screenshot

- Login
- Dashboard
- Data Karyawan
- Tambah Data
- Detail Data
- Edit Data
- Hapus Data

---

## Author

Muhammad Ariq Mubarak
