#include <iostream>
#include "Toko.cpp" // pastikan ini sudah include semua kelas lainnya

using namespace std;

int main() {
    Toko toko;

    cout << "===========================================\n";
    cout << "     SELAMAT DATANG DI TOKO ELEKTRONIK\n";
    cout << "        Sistem Manajemen Sederhana    \n";
    cout << "===========================================\n\n";

    // ================== BAGIAN PRODUK ==================
    cout << "=== Tambah Produk ===\n";
    Produk p1(1, "Laptop", 10000, 5);
    Produk p2(2, "Mouse", 150, 20);
    toko.tambahProduk(p1);
    toko.tambahProduk(p2);

    cout << "\n=== Tampilkan Semua Produk ===\n";
    toko.tampilkanSemuaProduk();

    cout << "\n=== Cari Produk ===\n";
    toko.cariProduk("Laptop");

    cout << "\n=== Update Produk ===\n";
    Produk p1Baru(1, "Laptop Gaming", 12000, 3);
    toko.ubahProduk(1, p1Baru);
    toko.tampilkanSemuaProduk();

    cout << "\n=== Hapus Produk ===\n";
    toko.hapusProduk(2);
    toko.tampilkanSemuaProduk();

    // ================== BAGIAN PEMBELI ==================
    cout << "\n=== Tambah Pembeli ===\n";
    Pembeli pemb1(1, "Rizki", "02102", "Jl. Merdeka 10");
    Pembeli pemb2(2, "Dani", "12231", "Jl. Sudirman 5");
    toko.tambahPembeli(pemb1);
    toko.tambahPembeli(pemb2);

    cout << "\n=== Tampilkan Semua Pembeli ===\n";
    toko.tampilkanSemuaPembeli();

    cout << "\n=== Cari Pembeli ===\n";
    toko.cariPembeli("Rizki");

    cout << "\n=== Update Pembeli ===\n";
    Pembeli pembBaru(1, "Rizki Pratama", "081221", "Jl. Merdeka 11");
    toko.ubahPembeli(1, pembBaru);
    cout << endl;
    toko.tampilkanSemuaPembeli();

    cout << "\n=== Hapus Pembeli ===\n";
    toko.hapusPembeli(2);
    cout << endl;
    toko.tampilkanSemuaPembeli();

    // ================== BAGIAN TRANSAKSI ==================
    cout << "\n=== Tambah Transaksi ===\n";
    toko.tambahTransaksi(1, 1, 1, "2025-09-13", 2); // Rizki beli 2 Laptop Gaming

    cout << "\n=== Tampilkan Semua Transaksi ===\n";
    toko.tampilkanSemuaTransaksi();

    cout << "\n=== Cari Transaksi ===\n";
    toko.cariTransaksi(1);

    cout << "\n=== Update Transaksi ===\n";
    Transaksi transaksiBaru(1, 1, 1, "2025-09-13", 1, 12000); // ubah jumlah beli jadi 1
    toko.updateTransaksi(1, transaksiBaru);
    cout << endl;
    toko.tampilkanSemuaTransaksi();

    cout << "\n=== Hapus Transaksi ===\n";
    toko.hapusTransaksi(1);
    toko.tampilkanSemuaTransaksi();

    return 0;
}
