#include <iostream>
#include <string>
#include "TokoElektronik.cpp" // include toko
using namespace std;

int main() {
    TokoElektronik toko; // membuat objek toko
    int pilihan; // untuk pilihan 

    do {
        // Menu
        cout << "\nMenu Toko Elektronik: \n";
        cout << "1. Tambah Produk\n";
        cout << "2. Lihat Produk\n";
        cout << "3. Update Produk\n";
        cout << "4. Hapus Produk\n";
        cout << "5. Cari Produk\n";
        cout << "6. Keluar\n";
        cout << "Pilih: ";
        cin >> pilihan;

        if (pilihan == 1) { // tambah produk
            int id, harga, stok;
            string nama;
            cout << "Masukkan ID: "; cin >> id;
            cout << "Masukkan Nama: "; cin.ignore(); getline(cin, nama);
            cout << "Masukkan Harga: "; cin >> harga;
            cout << "Masukkan Stok: "; cin >> stok;

            TokoElektronik p(id, nama, harga, stok);
            toko.tambahProduk(p);
        } else if (pilihan == 2) { // menampilkan produk
            toko.tampilkanProduk();
        } else if (pilihan == 3) { // mengupdate produk
            int id;
            cout << "Masukkan ID produk yang ingin diupdate: ";
            cin >> id;
            toko.updateProduk(id);
        } else if (pilihan == 4) { // menghapus produk
            int id;
            cout << "Masukkan ID produk yang ingin dihapus: "; cin >> id;
            toko.hapusProduk(id);
        }else if(pilihan == 5){ // mencari produk dari nama
            string keyword;
            cout << "Masukkan keyword nama produk: ";
            cin.ignore(); 
            getline(cin, keyword);

            vector<TokoElektronik> hasil = toko.cariProdukByNama(keyword);

            if (hasil.empty()) {
                cout << "Produk dengan keyword \"" << keyword << "\" tidak ditemukan.\n";
            } else {
                cout << "Hasil pencarian:\n";
                for (auto &p : hasil) {
                    cout << "ID: " << p.getId()
                        << " | Nama: " << p.getNama()
                        << " | Harga: " << p.getHarga()
                        << " | Stok: " << p.getStok() << endl;
                }
            }
        }else if (pilihan == 6) { // keluar program
                cout << "Keluar dari program.\n";
            } else { // error handling
                cout << "Pilihan tidak valid, coba lagi.\n";
            }

    } while (pilihan != 6);

            return 0;
        }
