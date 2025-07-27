# jejak_imani


Cara Menjalankan Web:



1.Masuk ke direktori Docker, lalu jalankan perintah berikut:
  docker-compose up -d --build
  Tunggu beberapa saat hingga proses build dan migrasi database selesai secara otomatis (sekitar 3 menit).

  2 Setelah kontainer aktif (sekitar 3–4 menit), kamu dapat langsung mengakses data pengguna di tabel users yang dibuat oleh factory.
Semua user memiliki password yang sama: password123 

3. Masuk ke browser lalu jalankan http://localhost:8081/

Letak source Laravel berada pada laravel_backend/laravel/ # Source Laravel Project (composer.json, routes, app, etc.)





project-root/
│
├── docker-compose.yml
│
├── postgres/
│   └── Dockerfile         # Dockerfile untuk PostgreSQL
│
├── laravel/
│   └── Dockerfile         # Dockerfile Laravel PHP-FPM
│   └── php/
│       ├── start-container.sh    # Script entrypoint container Laravel
│       └── laravel-cron          # Cron file (opsional)
│
├── nginx/
│   ├── Dockerfile          # Dockerfile untuk Nginx
│   └── default.conf        # Konfigurasi default Nginx
│
└── ../laravel_backend/
    └── laravel/            # Source Laravel Project (composer.json, routes, app, etc.)
