# Sensus Pemuda

Sistem informasi sensus dan pendataan pemuda berbasis web, dibangun dengan CodeIgniter 3.

## Tech Stack

- **Framework**: CodeIgniter 3
- **Language**: PHP 5.3.7+
- **Database**: MySQL

## Fitur

- Pendataan anggota/pemuda
- Data jamaah
- Formulir pendaftaran dan pengisian data
- Data pekerjaan, pendidikan, dan pendapatan
- Data tanggungan/keluarga
- Riwayat dan histori data
- Autentikasi admin

## Struktur Proyek

```
application/
├── controllers/    # Controller (Admin, Anggota, Jamaah, Formulir, dll.)
├── models/         # Model (M_anggota, M_jamaah, M_formulir, dll.)
├── views/
│   ├── content/    # Template halaman utama
│   ├── template/   # Komponen template reusable
│   └── errors/     # Halaman error
├── config/         # Konfigurasi aplikasi dan database
├── helpers/        # Helper functions
└── libraries/      # Library tambahan
system/             # CodeIgniter framework
media/              # File media upload
static/             # Aset statis (CSS, JS, gambar)
```

## Instalasi

**Prasyarat**: PHP 5.6+, MySQL, Composer

```bash
# Clone repository
git clone https://github.com/immuttaqien/sensus-pemuda.git
cd sensus-pemuda

# Install dependencies
composer install
```

**Setup database:**

1. Buat database baru di MySQL
2. Import file SQL ke database
3. Konfigurasi koneksi di `application/config/database.php`:

```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'nama_database',
    'dbdriver' => 'mysqli',
    ...
);
```

**Konfigurasi aplikasi:**

Sesuaikan `application/config/config.php`:

```php
$config['base_url'] = 'http://localhost/sensus-pemuda/';
```

## Menjalankan Aplikasi

Letakkan folder project di direktori web server (misal: `htdocs` untuk XAMPP) dan akses melalui browser:

```
http://localhost/sensus-pemuda/
```

## Modul

| Modul | Deskripsi |
|-------|-----------|
| Anggota | Pendataan anggota/pemuda |
| Jamaah | Data jamaah |
| Formulir | Formulir pendaftaran dan pengisian data |
| Pekerjaan | Data pekerjaan anggota |
| Pendidikan | Riwayat pendidikan anggota |
| Pendapatan | Data pendapatan anggota |
| Tanggungan | Data tanggungan/keluarga anggota |
| Riwayat | Histori data anggota |

## Lisensi

[MIT](license.txt)
