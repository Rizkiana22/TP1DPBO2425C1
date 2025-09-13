#include <iostream>
#include <vector>
// Include kelas lain yang diperlukan
#include "Produk.cpp"
#include "Pembeli.cpp"
#include "Transaksi.cpp"
using namespace std;

/**
 * Kelas Toko
 * -----------------
 * Menyimpan daftar Produk, Pembeli, dan Transaksi.
 * Menyediakan method CRUD (Create, Read, Update, Delete) 
 * untuk Produk, Pembeli, dan juga pencatatan Transaksi.
 */
class Toko {
    private:
        // List produk yang tersedia di toko
        vector<Produk> daftarProduk;

        // List pembeli yang terdaftar
        vector<Pembeli> daftarPembeli;

        // List transaksi yang terjadi
        vector<Transaksi> daftarTransaksi;

    public:
        // =========== Constructor =========== //
        Toko() {
        }

        /* ===================== BAGIAN PRODUK ===================== */

        // Tambah produk baru ke daftar
        void tambahProduk(const Produk& produk) {
            daftarProduk.push_back(produk); // simpan produk ke vector
            cout << "Produk berhasil ditambahkan.\n";
        }

        // Cari produk berdasarkan nama
        void cariProduk(const string& namaProduk) {
            bool found = false; // menandai apakah produk ditemukan
            int i = 0;
            while (i < daftarProduk.size() && !found) {
                if (daftarProduk[i].getNama() == namaProduk) {
                    daftarProduk[i].displayInfo(); // tampilkan info produk
                    found = true;
                }
                i++;
            }
            if (!found) { 
                cout << "Produk dengan nama " << namaProduk << " tidak ditemukan." << endl;
            }
        }

        // Ubah data produk berdasarkan ID
        void ubahProduk(int id, const Produk& produkBaru) {
            bool found = false;
            int i = 0;
            while (i < daftarProduk.size() && !found) {
                if (daftarProduk[i].getIdProduk() == id) {
                    daftarProduk[i] = produkBaru; // update data produk
                    cout << "Produk berhasil diubah.\n";
                    found = true;
                }
                i++;
            }
            if (!found) {
                cout << "Produk dengan ID " << id << " tidak ditemukan.\n";
            }
        }

        // Hapus produk berdasarkan ID
        void hapusProduk(int id) {
            bool found = false;
            int i = 0;
            while (i < daftarProduk.size() && !found) {
                if (daftarProduk[i].getIdProduk() == id) {
                    daftarProduk.erase(daftarProduk.begin() + i); // hapus produk
                    cout << "Produk berhasil dihapus.\n";
                    found = true;
                }
                i++;
            }
            if (!found) {
                cout << "Produk dengan ID " << id << " tidak ditemukan.\n";
            }
        }

        // Tampilkan semua produk di toko
        void tampilkanSemuaProduk() {
            for (auto& produk : daftarProduk) {
                produk.displayInfo(); // panggil method display tiap produk
            }
        }

        /* ===================== BAGIAN PEMBELI ===================== */

        // Tambah pembeli baru ke daftar
        void tambahPembeli(const Pembeli& pembeli) {
            daftarPembeli.push_back(pembeli); // simpan pembeli ke vector
            cout << "Pembeli berhasil ditambahkan.\n";
        }

        // Cari pembeli berdasarkan nama
        void cariPembeli(const string& namaPembeli) {
            bool found = false;
            int i = 0;
            while (i < daftarPembeli.size() && !found) {
                if (daftarPembeli[i].getNamaPembeli() == namaPembeli) {
                    daftarPembeli[i].displayInfo(); // tampilkan info pembeli
                    found = true;
                }
                i++;
            }
            if (!found) {
                cout << "Pembeli dengan nama " << namaPembeli << " tidak ditemukan." << endl;
            }
        }

        // Ubah data pembeli berdasarkan ID
        void ubahPembeli(int id, const Pembeli& pembeli) {
            bool found = false;
            int i = 0;
            while (i < daftarPembeli.size() && !found) {
                if (daftarPembeli[i].getIdPembeli() == id) {
                    daftarPembeli[i] = pembeli; // update data pembeli
                    found = true;
                }
                i++;
            }
            if (found) {
                cout << "Data pembeli berhasil diubah.\n";
            } else {
                cout << "Pembeli dengan ID " << id << " tidak ditemukan.\n";
            }
        }

        // Tampilkan semua data pembeli
        void tampilkanSemuaPembeli() {
            for (auto& pembeli : daftarPembeli) {
                pembeli.displayInfo(); // tampilkan info tiap pembeli
            }
        }

        // Hapus pembeli berdasarkan ID
        void hapusPembeli(int idPembeli) {
            bool found = false;
            int i = 0;
            while (i < daftarPembeli.size() && !found) {
                if (daftarPembeli[i].getIdPembeli() == idPembeli) {
                    daftarPembeli.erase(daftarPembeli.begin() + i); // hapus pembeli
                    found = true;
                }
                i++;
            }
            if (found) {
                cout << "Data pembeli berhasil dihapus.\n";
            } else {
                cout << "Pembeli dengan ID " << idPembeli << " tidak ditemukan.\n";
            }
        }

        /* ===================== BAGIAN TRANSAKSI ===================== */

        // Tambah transaksi baru (validasi pembeli & produk)
        void tambahTransaksi(int idTransaksi, int idPembeli, int idProduk, const string& tanggal, int jumlahItem) {
            // cek pembeli berdasarkan ID
            bool foundPembeli = false;
            int i = 0;
            while (i < daftarPembeli.size() && !foundPembeli) {
                if (daftarPembeli[i].getIdPembeli() == idPembeli) {
                    foundPembeli = true;
                }
                i++;
            }
            if (!foundPembeli) {
                cout << "Pembeli dengan ID " << idPembeli << " tidak ditemukan.\n";
                return;
            }

            // cek produk berdasarkan ID
            bool foundProduk = false;
            int j = 0;
            while (j < daftarProduk.size() && !foundProduk) {
                if (daftarProduk[j].getIdProduk() == idProduk) {
                    foundProduk = true;
                    if (daftarProduk[j].getStok() >= jumlahItem) {
                        double totalHarga = daftarProduk[j].getHarga() * jumlahItem;
                        Transaksi transaksi(idTransaksi, idPembeli, idProduk, tanggal, jumlahItem, totalHarga);
                        daftarTransaksi.push_back(transaksi); // simpan transaksi
                        daftarProduk[j].setStok(daftarProduk[j].getStok() - jumlahItem); // update stok
                        cout << "Transaksi berhasil ditambahkan.\n";
                    } else {
                        cout << "Stok produk tidak mencukupi.\n";
                    }
                }
                j++;
            }
            // Jika produk tidak ditemukan
            if (!foundProduk) {
                cout << "Produk dengan ID " << idProduk << " tidak ditemukan.\n";
            }
        }

        // Tampilkan semua transaksi
        void tampilkanSemuaTransaksi() {
            for (auto& transaksi : daftarTransaksi) { 
                transaksi.displayInfo(); // tampilkan info tiap transaksi
            }
        }

        // Cari transaksi berdasarkan ID
        void cariTransaksi(int idTransaksi) {
            bool found = false;
            int i = 0;
            while (i < daftarTransaksi.size() && !found) {
                if (daftarTransaksi[i].getIdTransaksi() == idTransaksi) {
                    daftarTransaksi[i].displayInfo(); // tampilkan info transaksi
                    found = true;
                }
                i++;
            }
            if (!found) {
                cout << "Transaksi dengan ID " << idTransaksi << " tidak ditemukan." << endl;
            }
        }

        // Hapus transaksi berdasarkan ID
        void hapusTransaksi(int idTransaksi) {
            bool found = false;
            int i = 0;
            while (i < daftarTransaksi.size() && !found) {
                if (daftarTransaksi[i].getIdTransaksi() == idTransaksi) {
                    daftarTransaksi.erase(daftarTransaksi.begin() + i); // hapus transaksi
                    found = true;
                }
                i++;
            }
            if(!found){
                cout << "Transaksi dengan ID " << idTransaksi << " tidak ditemukan.\n";
            }else{
                cout << "Data transaksi berhasil dihapus.\n";
            }
        }

        // Ubah data transaksi berdasarkan ID
        void updateTransaksi(int idTransaksi, const Transaksi& transaksiBaru) {
            bool found = false;
            int i = 0;
            while (i < daftarTransaksi.size() && !found) {
                if (daftarTransaksi[i].getIdTransaksi() == idTransaksi) {
                    daftarTransaksi[i] = transaksiBaru; // update data transaksi
                    cout << "Data transaksi berhasil diubah.\n";
                    found = true;
                }
                i++;
            }
            if (!found) {
                cout << "Transaksi dengan ID " << idTransaksi << " tidak ditemukan.\n";
            }
        }

        // ========== Destructor =========== //
        ~Toko() {
            // bisa dipakai untuk dealokasi jika diperlukan
        }
};
