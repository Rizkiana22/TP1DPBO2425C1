#include "tokoElektronik.cpp" // Include file implementasi kelas TokoElektronik
#include <iostream>
using namespace std;

int main() {
    TokoElektronik toko;   // Membuat objek toko
    int pilihan, id, stok; // Variabel untuk menu, id produk, dan stok produk
    string nama, keyword;  // Variabel untuk nama produk dan keyword pencarian
    double harga;          // Variabel harga produk

    // Perulangan menu utama (akan terus berjalan sampai pilihan = 6)
    do {
        cout << "\n=== Menu Toko Elektronik ===\n";
        cout << "1. Tambah Produk\n";
        cout << "2. Tampilkan Produk\n";
        cout << "3. Update Produk\n";
        cout << "4. Hapus Produk\n";
        cout << "5. Cari Produk (berdasarkan nama)\n";
        cout << "6. Keluar\n";
        cout << "Pilihan: ";
        cin >> pilihan;

        // Pilihan menu
        switch (pilihan) {
        case 1: // Tambah produk baru
            cout << "Masukkan ID Produk: ";
            cin >> id;
            cin.ignore(); // digunakan agar input string tidak terlewat setelah input angka.
            cout << "Masukkan Nama Produk: ";
            getline(cin, nama);
            cout << "Masukkan Harga Produk: ";
            cin >> harga;
            cout << "Masukkan Stok Produk: ";
            cin >> stok;
            toko.tambahProduk(id, nama, harga, stok); // Panggil method tambahProduk
            break;

        case 2: // Tampilkan semua produk
            toko.tampilkanProduk();
            break;

        case 3: // Update produk berdasarkan ID
            cout << "Masukkan ID Produk yang ingin diupdate: ";
            cin >> id;
            cin.ignore(); // digunakan agar input string tidak terlewat setelah input angka.
            cout << "Masukkan Nama Baru: ";
            getline(cin, nama);
            cout << "Masukkan Harga Baru: ";
            cin >> harga;
            cout << "Masukkan Stok Baru: ";
            cin >> stok;
            toko.updateProduk(id, nama, harga, stok); // Panggil method updateProduk
            break;

        case 4: // Hapus produk berdasarkan ID
            cout << "Masukkan ID Produk yang ingin dihapus: ";
            cin >> id;
            toko.hapusProduk(id); // Panggil method hapusProduk
            break;

        case 5: // Cari produk berdasarkan keyword nama
            cin.ignore();
            cout << "Masukkan keyword nama produk: ";
            getline(cin, keyword);
            toko.cariProdukByNama(keyword); // Panggil method cariProdukByNama
            break;

        case 6: // Keluar dari program
            cout << "Keluar dari program.\n";
            break;

        default: // Jika input tidak valid
            cout << "Pilihan tidak valid.\n";
        }
    } while (pilihan != 6); // Ulang terus sampai pilih keluar

    return 0;
}
