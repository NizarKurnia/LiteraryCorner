# LAPORAN PROJECT LITERARY CORNER

**Program Studi:** Teknologi Informasi  
**Jenjang Pendidikan:** Diploma III  
**Tanggal:** Mei 2026

---

## 1. PENDAHULUAN

### 1.1 Latar Belakang

Industri buku di era digital mengalami transformasi signifikan. Kebutuhan akan platform perdagangan buku online semakin meningkat seiring dengan perubahan perilaku konsumen yang memilih kemudahan berbelanja secara online. Oleh karena itu, project **Literary Corner** dikembangkan sebagai solusi platform e-commerce khusus untuk penjualan buku dengan antarmuka yang user-friendly dan sistem manajemen yang efisien.

Aplikasi ini dirancang untuk memenuhi kebutuhan penjual buku dalam mengelola katalog produk, transaksi penjualan, dan interaksi dengan pelanggan secara terintegrasi dalam satu sistem.

### 1.2 Tujuan Project

Tujuan pengembangan project Literary Corner adalah:

1. **Menyediakan platform e-commerce buku** yang memudahkan pelanggan untuk mencari, memilih, dan membeli buku secara online
2. **Mengimplementasikan sistem manajemen inventory** yang dapat melacak stok buku secara real-time
3. **Mengintegrasikan sistem transaksi dan pembayaran** yang aman dan terpercaya
4. **Menerapkan autentikasi dan otorisasi** yang tepat untuk menjaga keamanan data pengguna
5. **Menyediakan fitur customer service** untuk menjawab pertanyaan dan keluhan pelanggan
6. **Mendemonstrasikan penerapan teknologi web modern** dalam pengembangan aplikasi full-stack

---

## 2. ANALISIS SISTEM

### 2.1 Deskripsi Sistem

Literary Corner adalah aplikasi web e-commerce yang menyediakan fitur-fitur berikut:

- **Katalog Buku**: Menampilkan daftar lengkap buku dengan informasi detail, foto cover, harga, dan stok
- **Sistem Autentikasi**: Registrasi dan login user dengan keamanan JWT (JSON Web Token)
- **Shopping Cart**: Memungkinkan pengguna menambahkan buku ke keranjang belanja sebelum checkout
- **Sistem Transaksi**: Proses pembelian dengan berbagai metode pembayaran dan tracking status pembayaran
- **Contact/Support**: Fitur untuk pelanggan mengirim pesan atau pertanyaan ke customer service
- **Dashboard Admin**: Interface untuk mengelola data buku, genre, author, transaksi, dan kontak

### 2.2 Aktor Sistem

1. **Pengunjung/Guest**: Pengguna yang belum login dapat melihat katalog buku dan informasi tentang toko
2. **Pelanggan (User)**: Pengguna yang telah login dapat membeli buku, kelola cart, dan lihat riwayat transaksi
3. **Admin**: Pengelola sistem yang dapat mengelola semua data dan fitur aplikasi

### 2.3 Alur Proses Utama

**Proses Pembelian:**
```
Guest/Login → Lihat Katalog Buku → Pilih Buku → Tambah ke Cart 
→ Lanjut ke Checkout → Isi Detail Pembayaran → Konfirmasi Transaksi 
→ Riwayat Transaksi
```

**Proses Support:**
```
User → Form Kontak → Kirim Pesan → Tersimpan di Database
```

---

## 3. TEKNOLOGI YANG DIGUNAKAN

### 3.1 Backend

| Teknologi | Versi | Fungsi |
|-----------|-------|--------|
| **Laravel Framework** | 12.0 | Framework web PHP modern untuk backend |
| **PHP** | 8.2+ | Bahasa pemrograman server-side |
| **JWT Auth** | 2.3 | Autentikasi berbasis token |
| **Laravel Sanctum** | 4.0 | API token authentication |
| **Composer** | Latest | Package manager untuk PHP |

### 3.2 Frontend

| Teknologi | Versi | Fungsi |
|-----------|-------|--------|
| **Vite** | 7.0.7 | Build tool dan dev server yang cepat |
| **Tailwind CSS** | 4.0.0 | Framework CSS untuk styling responsif |
| **Axios** | 1.11.0 | HTTP client untuk AJAX requests |
| **JavaScript/ES Module** | Latest | Bahasa pemrograman frontend |

### 3.3 Database

| Komponen | Spesifikasi |
|----------|-------------|
| **DBMS** | MySQL/MariaDB (melalui Laravel) |
| **ORM** | Eloquent (Laravel) |
| **Migrasi** | Database Migration (Laravel) |
| **Seeding** | Factory & Seeder (Laravel) |

### 3.4 Tools & DevOps

| Tools | Fungsi |
|-------|--------|
| **Git** | Version control |
| **Laravel Pint** | Code formatter dan linter |
| **Pest** | Testing framework untuk PHP |
| **Artisan CLI** | Command-line interface Laravel |

### 3.5 Stack Diagram

```
┌─────────────────────────────────────────┐
│         Frontend Layer                  │
│  Vue/JavaScript + Tailwind CSS + Axios │
└─────────────────┬───────────────────────┘
                  │ HTTP/AJAX (JSON)
┌─────────────────v───────────────────────┐
│         Backend Layer                   │
│  Laravel 12 + PHP 8.2 + JWT Auth       │
│  (Controllers, Models, Routes, Middleware)
└─────────────────┬───────────────────────┘
                  │ Eloquent ORM
┌─────────────────v───────────────────────┐
│      Database Layer                     │
│         MySQL/MariaDB                   │
│   (Users, Books, Transactions, etc)     │
└─────────────────────────────────────────┘
```

---

## 4. FITUR-FITUR SISTEM

### 4.1 Fitur Publik (Tanpa Login)

1. **Halaman Home/Landing Page**
   - Menampilkan informasi umum tentang Literary Corner
   - Navigasi ke halaman buku dan tentang

2. **Halaman About**
   - Informasi lengkap tentang toko dan visi misi

3. **Katalog Buku**
   - Menampilkan daftar semua buku yang tersedia
   - Filter berdasarkan genre
   - Pencarian buku
   - Tampilkan detail buku (judul, penulis, genre, harga, stok)

4. **Registrasi & Login**
   - Form registrasi user baru
   - Form login dengan validasi
   - Autentikasi berbasis JWT

### 4.2 Fitur User (Setelah Login)

1. **Manajemen Cart**
   - Tambah buku ke keranjang
   - Update jumlah quantity
   - Hapus item dari cart
   - Lihat total harga

2. **Sistem Transaksi**
   - Lihat daftar transaksi yang telah dilakukan
   - Buat transaksi baru (checkout)
   - Pilih metode pembayaran (Cash on Delivery, Transfer, E-Wallet)
   - Tracking status pembayaran

3. **Dukungan Pelanggan**
   - Lihat daftar kontak yang telah dikirim
   - Form untuk mengirim pertanyaan/pesan ke customer service

4. **Riwayat Pembelian**
   - Melihat semua transaksi yang telah dilakukan
   - Detail transaksi termasuk buku yang dibeli, tanggal, dan status

### 4.3 Fitur Admin (Backend Management)

1. **Manajemen Buku**
   - CRUD (Create, Read, Update, Delete) buku
   - Upload foto cover
   - Set harga dan stok
   - Kaitkan dengan author dan genre

2. **Manajemen Author**
   - CRUD data author
   - Informasi biografi author

3. **Manajemen Genre**
   - CRUD kategori genre buku
   - Deskripsi genre

4. **Manajemen Pengguna**
   - Lihat daftar user yang terdaftar
   - Edit data user
   - Suspend atau hapus user

5. **Manajemen Transaksi**
   - Lihat semua transaksi
   - Update status pembayaran
   - Export laporan transaksi

6. **Manajemen Kontak/Pesan**
   - Lihat pesan dari pelanggan
   - Balas pesan pelanggan
   - Arsipkan pesan

---

## 5. STRUKTUR DATABASE

### 5.1 ERD (Entity Relationship Diagram)

```
┌─────────────┐         ┌─────────────┐
│    Users    │         │   Contacts  │
├─────────────┤         ├─────────────┤
│ id (PK)     │         │ id (PK)     │
│ name        │         │ name        │
│ email       │◄────────│ email       │
│ password    │         │ message     │
│ created_at  │         │ created_at  │
└─────────────┘         └─────────────┘

┌─────────────┐    ┌─────────────┐    ┌─────────────┐
│   Genres    │    │   Authors   │    │   Books     │
├─────────────┤    ├─────────────┤    ├─────────────┤
│ id (PK)     │    │ id (PK)     │    │ id (PK)     │
│ name        │    │ name        │    │ title       │
│ description │    │ biography   │    │ description │
└─────────────┘    └─────────────┘    │ price       │
     ▲                  ▲              │ stock       │
     │                  │              │ cover_photo │
     └──────────┬───────┘              │ genre_id(FK)│
                │                      │ author_id(FK)
                └──────────────────────└─────────────┘
                         │
          ┌──────────────┼──────────────┐
          │              │              │
     ┌────v───────┐ ┌───v────────┐ ┌──v──────────┐
     │   Carts    │ │Transactions│ │PersonalAccess│
     ├────────────┤ ├────────────┤ │   Tokens    │
     │ id (PK)    │ │ id (PK)    │ ├──────────────┤
     │customer_id │ │order_number│ │ id (PK)      │
     │book_id(FK) │ │customer_id │ │tokenable_id  │
     │ quantity   │ │book_id(FK) │ │token (unique)│
     │total_price │ │ quantity   │ │name          │
     └────────────┘ │total_amount│ │created_at    │
                    │payment_method
                    │payment_status
                    └────────────┘
```

### 5.2 Detail Tabel

#### Tabel: Users
```sql
id (BIGINT, PK)
name (VARCHAR)
email (VARCHAR, UNIQUE)
password (VARCHAR)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
```

#### Tabel: Genres
```sql
id (BIGINT, PK)
name (VARCHAR)
description (TEXT)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
```

#### Tabel: Authors
```sql
id (BIGINT, PK)
name (VARCHAR)
biography (TEXT, nullable)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
```

#### Tabel: Books
```sql
id (BIGINT, PK)
title (VARCHAR)
description (TEXT, nullable)
price (INTEGER)
stock (INTEGER)
cover_photo (VARCHAR, nullable)
genre_id (BIGINT, FK → genres.id)
author_id (BIGINT, FK → authors.id)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
```

#### Tabel: Carts
```sql
id (BIGINT, PK)
customer_id (BIGINT, FK → users.id)
book_id (BIGINT, FK → books.id)
quantity (INTEGER)
total_price (DECIMAL)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
```

#### Tabel: Transactions
```sql
id (BIGINT, PK)
order_number (VARCHAR, UNIQUE)
customer_id (BIGINT, FK → users.id)
book_id (BIGINT, FK → books.id)
quantity (INTEGER)
total_amount (DECIMAL)
payment_method (ENUM: 'Cash on Delivery', 'Transfer', 'E-Wallet')
payment_status (ENUM: 'Pending', 'Paid', 'Cancelled')
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
```

#### Tabel: Contacts
```sql
id (BIGINT, PK)
name (VARCHAR)
email (VARCHAR)
message (TEXT)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
```

#### Tabel: Personal Access Tokens
```sql
id (BIGINT, PK)
tokenable_type (VARCHAR)
tokenable_id (BIGINT)
name (VARCHAR)
token (VARCHAR, UNIQUE)
abilities (JSON, nullable)
last_used_at (TIMESTAMP, nullable)
expires_at (TIMESTAMP, nullable)
created_at (TIMESTAMP)
updated_at (TIMESTAMP)
```

### 5.3 Relasi Antar Tabel

1. **Books → Genre**: Many-to-One (Banyak buku dalam satu genre)
2. **Books → Author**: Many-to-One (Banyak buku dari satu author)
3. **Carts → Users**: Many-to-One (Banyak cart items milik satu user)
4. **Carts → Books**: Many-to-One (Banyak cart items mengarah satu buku)
5. **Transactions → Users**: Many-to-One (Banyak transaksi dari satu user)
6. **Transactions → Books**: Many-to-One (Banyak transaksi untuk satu buku)
7. **Contacts → Users**: Many-to-One (Banyak kontak dari satu user)

---

## 6. IMPLEMENTASI & TAMPILAN

### 6.1 Struktur Folder Project

```
LiteraryCorner/
├── app/
│   ├── Http/
│   │   ├── Controllers/       (Business logic & request handling)
│   │   └── Middleware/        (Interceptors: auth, CORS, etc)
│   ├── Models/                (Database models: Book, User, etc)
│   └── Providers/             (Service providers)
├── bootstrap/
│   └── app.php, providers.php
├── config/
│   ├── app.php                (Konfigurasi aplikasi)
│   ├── auth.php               (Konfigurasi autentikasi)
│   ├── database.php           (Konfigurasi database)
│   ├── jwt.php                (JWT configuration)
│   └── ...
├── database/
│   ├── migrations/            (Database schema)
│   ├── seeders/               (Test data)
│   └── factories/             (Factory untuk testing)
├── resources/
│   ├── css/
│   │   └── app.css            (Tailwind styles)
│   ├── js/
│   │   ├── app.js             (Main JS)
│   │   └── bootstrap.js       (Bootstrap config)
│   └── views/
│       ├── layouts/           (Master templates)
│       ├── components/        (Reusable UI components)
│       ├── auth/              (Login/Register pages)
│       └── pages/             (Page views)
├── routes/
│   ├── web.php                (Web routes)
│   └── console.php            (CLI commands)
├── tests/
│   ├── Feature/               (Feature tests)
│   └── Unit/                  (Unit tests)
├── public/
│   ├── index.php              (Entry point)
│   ├── storage/               (Public file storage)
│   └── build/                 (Built assets)
├── storage/
│   ├── app/                   (File storage)
│   ├── framework/             (Framework temp files)
│   └── logs/                  (Application logs)
├── vendor/                    (PHP dependencies)
├── composer.json              (PHP dependencies config)
├── package.json               (Node dependencies config)
├── vite.config.js             (Vite build config)
├── phpunit.xml                (Testing config)
└── artisan                    (Laravel CLI)
```

### 6.2 Endpoint/Routes Utama

#### Public Routes
```
GET  /                          → Home page
GET  /about                     → About page
GET  /books                     → Daftar semua buku
GET  /books/{id}               → Detail buku
GET  /register                 → Halaman registrasi
POST /register                 → Proses registrasi
GET  /login                    → Halaman login
POST /login                    → Proses login
```

#### Protected Routes (Butuh Login)
```
POST /logout                   → Proses logout
GET  /transactions             → Daftar transaksi user
GET  /transactions/create      → Form buat transaksi
POST /transactions             → Simpan transaksi
GET  /transactions/{id}        → Detail transaksi
GET  /carts                    → Daftar cart items
POST /carts                    → Tambah ke cart
PUT  /carts/{id}              → Update cart item
DELETE /carts/{id}            → Hapus cart item
GET  /contacts                 → Daftar kontak user
POST /contacts                 → Tambah kontak baru
```

#### Admin Routes (Backend)
```
GET    /admin/books            → Manajemen buku
POST   /admin/books            → Tambah buku
PUT    /admin/books/{id}       → Edit buku
DELETE /admin/books/{id}       → Hapus buku
(Sama untuk: authors, genres, users, transactions, contacts)
```

### 6.3 Fitur Keamanan

1. **JWT Authentication**
   - Token-based authentication untuk API
   - Token expires setelah periode tertentu
   - Refresh token mechanism

2. **Password Hashing**
   - Password dienkripsi menggunakan bcrypt
   - Perbandingan password aman

3. **CSRF Protection**
   - Token validation untuk form submission
   - Middleware untuk proteksi

4. **Authorization**
   - Role-based access control (User vs Admin)
   - Middleware untuk check login status

5. **Input Validation**
   - Server-side validation untuk semua input
   - Sanitasi untuk prevent SQL injection
   - Email validation, file type checking

### 6.4 Contoh Alur Interaksi

**Alur Login User:**
1. User ke halaman `/login`
2. Isi email dan password
3. Kirim POST ke `/login`
4. Controller validasi kredensial
5. Generate JWT token
6. Return token ke frontend
7. Token disimpan di localStorage
8. Redirect ke halaman utama

**Alur Pembelian Buku:**
1. User di halaman `/books`
2. Pilih buku dan klik "Tambah ke Cart"
3. POST ke `/carts` dengan book_id & quantity
4. Controller tambah item ke tabel carts
5. Update total_price
6. User lanjut ke checkout di `/transactions/create`
7. Pilih metode pembayaran
8. POST ke `/transactions`
9. Controller buat record di tabel transactions
10. Update stok buku
11. Kosongkan cart items user
12. Redirect ke halaman detail transaksi

---

## 7. KENDALA DAN SOLUSI

### 7.1 Kendala Teknis

#### Kendala 1: Kompleksitas Relasi Database
**Deskripsi:** Relasi antar tabel yang kompleks antara Users, Books, Cart, dan Transactions memerlukan query yang optimal.

**Solusi:**
- Menggunakan Eloquent ORM yang powerful untuk handle relasi
- Implementasi eager loading untuk mencegah N+1 query problem
- Menggunakan query optimization techniques (indexing, caching)

#### Kendala 2: Performa Frontend
**Deskripsi:** Loading halaman yang lama saat menampilkan katalog buku dengan banyak data.

**Solusi:**
- Menggunakan Vite untuk build yang optimal dan code splitting
- Implementasi pagination untuk daftar buku
- Lazy loading untuk gambar cover buku
- Minification dan compression aset

#### Kendala 3: Keamanan Autentikasi
**Deskripsi:** Perlindungan terhadap unauthorized access dan CSRF attack.

**Solusi:**
- Implementasi JWT Auth yang terenkripsi
- Token expiration dan refresh mechanism
- CSRF middleware di Laravel
- Validation dan sanitasi input user

### 7.2 Kendala Implementasi

#### Kendala 1: File Upload
**Deskripsi:** Menangani upload foto cover buku dengan size yang berbeda-beda.

**Solusi:**
- Validasi ukuran file (max 2MB)
- Validasi tipe file (hanya image: jpg, png, webp)
- Resize dan optimize gambar menggunakan library intervention/image
- Simpan ke storage folder dengan structure folder per bulan

#### Kendala 2: Pembayaran Multiple Methods
**Deskripsi:** Menangani berbagai metode pembayaran (COD, Transfer, E-Wallet).

**Solusi:**
- Membuat struktur enum untuk payment methods
- Logic berbeda untuk setiap metode di controller
- Implementasi payment gateway integration di fase mendatang
- Tracking status pembayaran yang akurat

#### Kendala 3: Testing & QA
**Deskripsi:** Memastikan semua fitur berjalan dengan baik tanpa bug.

**Solusi:**
- Menggunakan Pest untuk unit testing dan feature testing
- Test coverage untuk business logic kritis
- Manual testing checklist sebelum deployment
- Implementasi logging untuk error tracking

### 7.3 Kendala Non-Teknis

#### Kendala 1: Dokumentasi
**Deskripsi:** Dokumentasi kode yang lengkap dan jelas untuk maintenance.

**Solusi:**
- Menambahkan PHPDoc comments untuk setiap method
- README dengan instruksi setup project
- Dokumentasi API endpoints
- Laporan project yang comprehensive (laporan ini)

#### Kendala 2: User Experience
**Deskripsi:** Interface yang intuitif dan user-friendly.

**Solusi:**
- Menggunakan Tailwind CSS untuk UI yang konsisten dan modern
- Responsive design untuk mobile dan desktop
- Form validation feedback yang jelas
- Clear error messages untuk user

---

## 8. KESIMPULAN DAN SARAN

### 8.1 Kesimpulan

**Literary Corner** telah berhasil dikembangkan sebagai platform e-commerce buku yang komprehensif dengan fitur-fitur utama meliputi:

1. **Katalog Buku**: Sistem untuk menampilkan dan mengelola data buku dengan genre dan author
2. **Authentication & Authorization**: Implementasi JWT untuk keamanan akses user dan admin
3. **Shopping Experience**: Cart dan transaksi yang intuitif untuk customer
4. **Database Design**: Struktur database yang normalized dan teroptimasi
5. **Modern Tech Stack**: Menggunakan teknologi terkini (Laravel 12, Vite, Tailwind CSS)
6. **Security**: Implementasi best practices keamanan web application

Aplikasi ini dapat digunakan sebagai fondasi solid untuk pengembangan lebih lanjut dan telah mendemonstrasikan penerapan konsep-konsep penting dalam pengembangan web modern.

### 8.2 Saran Pengembangan ke Depan

#### Fase 2: Enhancement Features
1. **Payment Gateway Integration**
   - Integrasi dengan Midtrans, Stripe, atau payment gateway lokal
   - Automated payment verification
   - Invoice generation & email

2. **User Profile Management**
   - User dapat edit profil personal
   - Address book untuk shipping
   - Wishlist / favorite books

3. **Review & Rating System**
   - User dapat beri rating buku 1-5 bintang
   - Tulis review untuk setiap buku
   - Average rating display

4. **Advanced Search & Filter**
   - Full-text search dengan relevance ranking
   - Filter berdasarkan price range, author, rating
   - Sort options (newest, bestseller, price, rating)

#### Fase 3: Analytics & Business Intelligence
1. **Dashboard Analytics**
   - Sales report dan revenue tracking
   - Best-selling books
   - Customer demographics
   - Monthly/yearly revenue trends

2. **Inventory Management**
   - Stock warning alerts
   - Reorder suggestions
   - Stock movement analytics

3. **Marketing Tools**
   - Promo codes & discount management
   - Email newsletter system
   - Customer segmentation

#### Fase 4: Performance & Scalability
1. **Caching Strategy**
   - Redis for session & cache
   - Query result caching
   - Page caching untuk catalog

2. **Database Optimization**
   - Advanced indexing strategy
   - Query optimization
   - Database replication setup

3. **API Rate Limiting**
   - Implement throttling
   - API versioning
   - Request logging & monitoring

#### Fase 5: Additional Features
1. **Mobile App**
   - Native atau cross-platform mobile application
   - Push notifications
   - Offline functionality

2. **Admin Portal Enhancements**
   - Dashboard with key metrics
   - Bulk operations (import/export)
   - Advanced reporting tools

3. **Customer Support**
   - Live chat integration
   - Ticketing system
   - FAQ & knowledge base

### 8.3 Rekomendasi Teknis

1. **Code Quality**
   - Implement code review process
   - Setup CI/CD pipeline dengan GitHub Actions
   - Increase test coverage hingga 80%+

2. **Deployment**
   - Setup staging environment untuk testing
   - Automated deployment ke production
   - Setup monitoring dan alerting

3. **Documentation**
   - Generate API documentation (Swagger/OpenAPI)
   - Setup developer documentation portal
   - Create video tutorials

4. **Security Audit**
   - Regular security penetration testing
   - Dependency vulnerability scanning
   - Implement Web Application Firewall (WAF)

### 8.4 Penutup

Literary Corner merupakan proof-of-concept yang sukses untuk platform e-commerce buku modern. Dengan arsitektur yang solid, keamanan yang baik, dan fitur-fitur essential, aplikasi ini siap untuk dilanjutkan pengembangan dengan fitur-fitur tambahan. Tahap selanjutnya adalah melakukan testing menyeluruh, deployment ke production environment, dan gathering feedback dari actual users untuk continuous improvement.

---

**Disiapkan oleh:** [Nama Developer]  
**Tanggal Pembuatan:** Mei 2026  
**Versi:** 1.0  
**Status:** Completed

---

## LAMPIRAN

### Lampiran A: Daftar File Penting

- `app/Http/Controllers/` - Business logic controllers
- `app/Models/` - Database models dengan relationships
- `database/migrations/` - Database schema definitions
- `database/seeders/` - Test data generators
- `routes/web.php` - Route definitions
- `resources/views/` - Template files
- `resources/css/app.css` - Styling
- `resources/js/app.js` - JavaScript main file

### Lampiran B: Setup Instructions

#### Prerequisites
- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & npm
- MySQL/MariaDB

#### Installation Steps
```bash
# Clone repository
git clone <repository-url>
cd LiteraryCorner

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database
php artisan migrate
php artisan db:seed

# Build frontend
npm run build

# Start development server
php artisan serve

# In another terminal, start Vite dev server
npm run dev
```

#### Running Tests
```bash
php artisan test
```

---

**END OF REPORT**
