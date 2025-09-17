# Sistem Manajemen Toko Elektronik

**Janji**: Saya Muhammad Rizkiana Pratama dengan NIM 2404421 mengerjakan TP1 pada mata kuliah DPBO, atas keberkahannya saya tidak melakukan kecurangan seperti yang dispesifikasikan


Program ini adalah implementasi sederhana sistem manajemen toko elektronik dengan fitur CRUD untuk Produk.
Program dibuat dalam 4 bahasa: C++, Java, Python, dan PHP.


## 1. C++ Version

### File: 
- TokoElektronik.cpp -> definisi class
- main.cpp -> file utama untuk menjalankan program

**Flow Kode:**
1. Membuat objek TokoElektronik.
2. Menambah produk (tambahProduk).
3. Menampilkan semua produk (tampilkanProduk).
4. Mengubah produk berdasarkan ID (updateProduk).
5. Menghapus produk berdasarkan ID (hapusProduk).
6. Mencari produk berdasarkan nama (cariProduk).
7. Program berjalan dalam loop menu sampai user memilih keluar.


### Struktur Class TokoElektronik

**Isi Kelas `TokoElektronik`:**
- **Atribut Produk**
  - `id` (int) → ID unik produk  
  - `nama` (string) → Nama produk  
  - `harga` (int) → Harga produk  
  - `stok` (int) → Jumlah stok produk  

- **Method CRUD**
1. tambahProduk(TokoElektronik &p) → Menambahkan produk baru ke vector
2. tampilkanProduk() → Menampilkan semua produk
3. updateProduk(int id) → Mengupdate produk berdasarkan ID (input langsung)
4. hapusProduk(int id) → Menghapus produk berdasarkan ID
5. cariProduk(string nama) → Mengembalikan vector berisi nama produk yang dicari
6. cariProduk(int id) → Mengembalikan pointer ke produk berdasarkan ID

**Contoh Output Console:**


## 2. Java Version

### File: 
- TokoElektronik.java -> definisi class
- Main.java -> file utama untuk menjalankan program

**Flow Kode:**
1. Membuat objek TokoElektronik.
2. Menambah produk (tambahProduk).
3. Menampilkan semua produk (tampilkanProduk).
4. Mengubah produk berdasarkan ID (updateProduk).
5. Menghapus produk berdasarkan ID (hapusProduk).
6. Mencari produk berdasarkan nama (cariProduk).
7. Program berjalan dalam loop menu sampai user memilih keluar.

### Struktur Class TokoElektronik

**Isi Kelas `TokoElektronik`:**
- **Atribut Produk**
  - `id` (int) → ID unik produk  
  - `nama` (string) → Nama produk  
  - `harga` (int) → Harga produk  
  - `stok` (int) → Jumlah stok produk  

- **Method CRUD**
1. tambahProduk(TokoElektronik &p) → Menambahkan produk baru ke array list
2. tampilkanProduk() → Menampilkan semua produk
3. updateProduk(int id) → Mengupdate produk berdasarkan ID (input langsung)
4. hapusProduk(int id) → Menghapus produk berdasarkan ID
5. cariProduk(string nama) → Mengembalikan daftar nama
6. cariProduk(int id) → Mengembalikan pointer ke produk berdasarkan ID


**Contoh Output Console:**


## 3. Python Version

### File: 
- toko_elektronik.py -> definisi class
- main.py -> file utama untuk menjalankan program

**Flow Kode:**
1. Membuat objek TokoElektronik.
2. Menambah produk (tambahProduk).
3. Menampilkan semua produk (tampilkanProduk).
4. Mengubah produk berdasarkan ID (updateProduk).
5. Menghapus produk berdasarkan ID (hapusProduk).
6. Mencari produk berdasarkan nama (cariProduk).
7. Program berjalan dalam loop menu sampai user memilih keluar.

### Struktur Class TokoElektronik

**Isi Kelas `TokoElektronik`:**
- **Atribut Produk**
  - `id` (int) → ID unik produk  
  - `nama` (string) → Nama produk  
  - `harga` (int) → Harga produk  
  - `stok` (int) → Jumlah stok produk  

- **Method CRUD**
1. tambahProduk(TokoElektronik &p) → Menambahkan produk baru ke list
2. tampilkanProduk() → Menampilkan semua produk
3. updateProduk(id) → Mengupdate produk berdasarkan ID (input langsung)
4. hapusProduk(id) → Menghapus produk berdasarkan ID
5. cariProduk(nama) → Mengembalikan daftar nama
5. cariProduk(id) → Mengembalikan pointer ke produk berdasarkan ID

**Contoh Output Console:**



## 4. PHP Version

### File: 
- TokoElektronik.php -> definisi class
- index.php -> file utama web interface
- Folder uploads/ -> menyimpan gambar produk

**Flow Kode:**
1. Start session untuk menyimpan data produk.
2. Tampilkan form untuk tambah/update produk.
3. Tampilkan tabel produk.
4. User bisa:
    - Tambah produk baru dengan gambar
    - Edit produk (update nama, harga, stok, gambar)
    - Hapus produk
    - Cari produk berdasarkan nama
5. Data produk disimpan di session, bukan database.

### Fitur Utama
1. CRUD Produk (Create, Read, Update, Delete)
2. Upload gambar produk (disimpan di folder uploads/)
3. Form tambah/update otomatis menyesuaikan saat edit
4. Cari produk berdasarkan keyword nama
5. Tabel HTML menampilkan ID, Nama, Harga, Stok, dan Gambar