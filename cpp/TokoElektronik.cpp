#include <iostream>
#include <vector>
#include <string>
using namespace std;

class TokoElektronik {
private:
    struct Produk {
        int id;
        string nama;
        double harga;
        int stok;
    };

    vector<Produk> daftarProduk; // vector untuk menyimpan struct Produk

public:
    // CONSTRUCTOR
    TokoElektronik() {
    }

    // Fungsi public untuk mencari index produk berdasarkan ID
    int cariProduk(int id){
        int i = 0;
        int idx = -1; // default jika tidak ditemukan
        while (i < daftarProduk.size() && idx == -1) {
            if (daftarProduk[i].id == id) {
                idx = i; // simpan indeks
            }
            i++;
        }
        return idx; // kembalikan -1 jika tidak ada yang cocok
    }


    // CREATE
    // method untuk menambah produk baru
    void tambahProduk(int id, string nama, double harga, int stok) {
        daftarProduk.push_back({id, nama, harga, stok});
        cout << "Produk berhasil ditambahkan!\n";
    }

    // READ
    // method untuk menampilkan semua produk
    void tampilkanProduk() const {
        if (daftarProduk.empty()) {
            cout << "Tidak ada produk.\n";
            return;
        }
        cout << "\n=== Daftar Produk ===\n";
        for (const auto &p : daftarProduk) {
            cout << "ID: " << p.id
                 << " | Nama: " << p.nama
                 << " | Harga: Rp" << p.harga
                 << " | Stok: " << p.stok
                 << endl;
        }
    }

    // UPDATE
    // method untuk mengupdate produk berdasarkan ID
    void updateProduk(int id, string namaBaru, double hargaBaru, int stokBaru) {
        int idx = cariProduk(id);
        if (idx != -1) {
            daftarProduk[idx].nama = namaBaru;
            daftarProduk[idx].harga = hargaBaru;
            daftarProduk[idx].stok = stokBaru;
            cout << "Produk berhasil diupdate!\n";
        } else {
            cout << "Produk dengan ID " << id << " tidak ditemukan.\n";
        }
    }

    // DELETE
    // method untuk menghapus produk berdasarkan ID
    void hapusProduk(int id) {
        int idx = cariProduk(id);
        if (idx != -1) {
            daftarProduk.erase(daftarProduk.begin() + idx);
            cout << "Produk berhasil dihapus!\n";
        } else {
            cout << "Produk dengan ID " << id << " tidak ditemukan.\n";
        }
    }

    // SEARCH
    // method untuk mencari produk berdasarkan nama
    void cariProdukByNama(string keyword) const {
        bool ketemu = false;
        cout << "\nHasil pencarian untuk \"" << keyword << "\":\n";
        for (const auto &p : daftarProduk) {
            if (p.nama.find(keyword) != string::npos) {
                cout << "ID: " << p.id
                     << " | Nama: " << p.nama
                     << " | Harga: Rp" << p.harga
                     << " | Stok: " << p.stok
                     << endl;
                ketemu = true;
            }
        }
        if (!ketemu) cout << "Produk tidak ditemukan.\n";
    }

    // DESTRUCTOR
    ~TokoElektronik() {
    }
};
