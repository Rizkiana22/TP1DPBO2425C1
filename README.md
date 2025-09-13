# Sistem Manajemen Toko Elektronik

**Janji**: Saya Muhammad Rizkiana Pratama dengan NIM 2404421 mengerjakan TP1 pada mata kuliah DPBO, atas keberkahannya saya tidak melakukan kecurangan seperti yang dispesifikasikan


Program ini adalah implementasi sederhana sistem manajemen toko elektronik dengan fitur **CRUD** untuk Produk, Pembeli, dan Transaksi.  
Program dibuat dalam **4 bahasa**: C++, Java, Python, dan PHP.


## 1. C++ Version

### Main File: `main.cpp`

**Flow Kode:**
1. Membuat objek `Toko`.
2. Menambah produk (`tambahProduk`).
3. Menampilkan semua produk (`tampilkanSemuaProduk`).
4. Mencari, mengubah, dan menghapus produk.
5. Menambah pembeli (`tambahPembeli`).
6. Menampilkan, mencari, mengubah, dan menghapus pembeli.
7. Menambah transaksi (`tambahTransaksi`) dengan validasi stok dan pembeli.
8. Menampilkan, mencari, mengubah (`updateTransaksi`), dan menghapus transaksi.

**Contoh Output Console:**

**Gambar:**
<img width="524" height="860" alt="Image" src="https://github.com/user-attachments/assets/52abac43-997a-452d-939c-873a72662bc1" />

**Video:**
(https://github.com/user-attachments/assets/832b6c6f-d0b7-42ff-b0ab-646b01835b30)

## 2. Java Version

### Main File: `Main.java`

**Flow Kode:**
- Mirip dengan versi C++, namun menggunakan **method Java**.
- Update transaksi menggunakan `updateTransaksi(int id, String tanggal, int jumlah)`.

**Contoh Output Console:**

**Gambar:**
<img width="527" height="894" alt="Image" src="https://github.com/user-attachments/assets/356448ad-1ddf-474c-877d-7822c6f58651" />

**Video:**
https://github.com/user-attachments/assets/6936ca25-0523-4c4f-8f6a-a621e78dfa73



## 3. Python Version

### Main File: `main.py`

**Flow Kode:**
- Membuat objek `Toko`.
- Menambah produk dan pembeli.
- Menampilkan, mencari, mengubah, dan menghapus data.
- Transaksi ditambah dengan validasi stok dan ID pembeli.
- Update transaksi menggunakan objek `Transaksi` baru.

**Contoh Output Console:**

**Gambar:**
<img width="612" height="836" alt="Image" src="https://github.com/user-attachments/assets/f489e445-3224-4b57-9239-86d1d145ec6c" />

**Video:**
https://github.com/user-attachments/assets/8c0b3802-71f5-42e2-9979-62baacf26be5

## 4. PHP Version

### Main File: index.php

**Flow Kode:**
Menggunakan session untuk menyimpan data toko ($_SESSION['toko']).
CRUD Produk:
- Tambah produk dengan add_produk (mendukung upload gambar).
- Edit produk dengan edit_produk dan hapus produk dengan delete_produk.
CRUD Pembeli:
- Tambah pembeli (add_pembeli) dengan upload gambar.
- Edit pembeli (edit_pembeli) dan hapus (delete_pembeli).
CRUD Transaksi:
- Tambah transaksi (add_transaksi) dengan validasi stok dan pemilihan produk & pembeli.
- Hapus transaksi (delete_transaksi).
Semua aksi disimpan kembali ke session dan halaman di-refresh otomatis.
Tampilan web sederhana menggunakan HTML dan form, dengan tabel untuk menampilkan Produk, Pembeli, dan Transaksi.

**Contoh Penggunaan:**

**Gambar:**
<img width="1903" height="910" alt="Image" src="https://github.com/user-attachments/assets/e2113c0c-0c0b-48c8-9c52-f2ce164f56cd" />

**Video:**
https://github.com/user-attachments/assets/3194306e-1bf6-40ed-815d-1e0e1dec9a98
