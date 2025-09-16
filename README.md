# Sistem Manajemen Toko Elektronik

**Janji**: Saya Muhammad Rizkiana Pratama dengan NIM 2404421 mengerjakan TP1 pada mata kuliah DPBO, atas keberkahannya saya tidak melakukan kecurangan seperti yang dispesifikasikan


Program ini adalah implementasi sederhana sistem manajemen toko elektronik dengan fitur **CRUD** untuk Produk, Pembeli, dan Transaksi.  
Program dibuat dalam **4 bahasa**: C++, Java, Python, dan PHP.


## 1. C++ Version

### Main File: `main.cpp`

**Flow Kode:**
1. Membuat objek `TokoElektronik`.
2. Menambah produk (`tambahProduk`).
3. Menampilkan semua produk (`tampilkanProduk`).
4. Mencari produk berdasarkan nama (`cariProdukByNama`).
5. Mengubah produk berdasarkan ID (`updateProduk`).
6. Menghapus produk berdasarkan ID (`hapusProduk`).
7. Keluar dari program.


### Class File: `tokoElektronik.cpp`

**Isi Kelas `TokoElektronik`:**
- **Atribut Produk**
  - `id` (int) → ID unik produk  
  - `nama` (string) → Nama produk  
  - `harga` (double) → Harga produk  
  - `stok` (int) → Jumlah stok produk  

- **Method CRUD**
  1. `tambahProduk(int id, string nama, double harga, int stok)` → Menambah produk baru.
  2. `tampilkanProduk()` → Menampilkan semua produk yang tersimpan.
  3. `updateProduk(int id, string namaBaru, double hargaBaru, int stokBaru)` → Mengupdate produk berdasarkan ID.
  4. `hapusProduk(int id)` → Menghapus produk berdasarkan ID.
  5. `cariProdukByNama(string keyword)` → Mencari produk berdasarkan keyword nama.
  6. `cariProduk(int id)` → Fungsi bantu mencari index produk berdasarkan ID.

**Contoh Output Console:**


## 2. Java Version

### File: `Main.java`

**Flow Program:**
1. Membuat objek `TokoElektronik`.
2. Menampilkan menu interaktif:
   - Tambah Produk (`tambahProduk`)
   - Tampilkan Produk (`tampilkanProduk`)
   - Update Produk (`updateProduk`)
   - Hapus Produk (`hapusProduk`)
   - Cari Produk berdasarkan nama (`cariProdukByNama`)
3. Program berjalan dalam loop `while` sampai user memilih keluar.

### Struktur Class
- `TokoElektronik`  
  - Inner Class `Produk` (atribut: `id`, `nama`, `harga`, `stok`)
  - Method CRUD: `tambahProduk`, `tampilkanProduk`, `updateProduk`, `hapusProduk`, `cariProdukByNama`
- `Main`  
  - Menyediakan menu interaktif berbasis `Scanner` untuk input user.


**Contoh Output Console:**


## 3. Python Version

### File: `main.py`

**Flow Program:**
1. Import class `TokoElektronik` dari file `toko_elektronik.py`.
2. Menampilkan menu interaktif di terminal.
3. Opsi menu:
   - Tambah Produk (`tambah_produk`)
   - Tampilkan Produk (`tampilkan_produk`)
   - Update Produk (`update_produk`)
   - Hapus Produk (`hapus_produk`)
   - Cari Produk berdasarkan nama (`cari_produk_by_nama`)
4. Program berjalan di dalam loop `while` sampai user memilih keluar (`6`).

**Contoh Output Console:**



## 4. PHP Version

Aplikasi sederhana CRUD (Create, Read, Update, Delete) untuk mengelola produk toko elektronik menggunakan **PHP** dan **HTML**.  
Produk yang ditambahkan bisa memiliki **ID, Nama, Harga, Stok, dan Gambar**.

---

### Fitur Utama
- Tambah produk baru dengan gambar
- Tampilkan daftar produk dalam tabel
- Edit produk (update nama, harga, stok, dan gambar)
- Hapus produk
- Cari produk berdasarkan nama
- Upload gambar produk (disimpan di folder `uploads/`)

---

## Teknologi
- **PHP** (tanpa framework, native PHP)
- **HTML + CSS** untuk tampilan
- **Session** untuk menyimpan data produk
- **File upload** (gambar produk disimpan di `/uploads`)