#include <iostream>
#include <vector>
#include <string>
using namespace std;

// membuat class
class TokoElektronik {
    private:
        int id;
        string nama;
        int harga;
        int stok;

        // vector untuk menyimpan class TokoElektronik
        vector<TokoElektronik> daftarProduk;

    public:
        // constructor
        TokoElektronik(){
        }
        TokoElektronik(int id, string nama, int harga, int stok) {
            this->id = id;
            this->nama = nama;
            this->harga = harga;
            this->stok = stok;
        }

        // ===== getter ===== //
        int getId(){
            return this->id;
        }

        string getNama(){
            return this->nama;
        }

        int getHarga(){
            return this->harga;
        }

        int getStok(){
            return this->stok;
        }

        // ===== setter ===== //
        void setId(int id){
            this->id = id;
        }

        void setNama(string nama){
            this->nama = nama;
        }

        void setHarga(int harga){
            this->harga = harga;
        }

        void setStok(int stok){
            this->stok = stok;
        }

        // === method === //

        // SEARCH
        // method untuk mencari produk berdasarkan id
        TokoElektronik* cariProduk(int id) {
            int i = 0;
            while (i < daftarProduk.size()) {
                if (daftarProduk[i].getId() == id) {
                    return &daftarProduk[i]; // return alamat produk
                }
                i++;
            }
            return nullptr; // tidak ketemu
        }

        // method cari produk berdasarkan keyword nama
        vector<TokoElektronik> cariProdukByNama(const string& keyword) { // data disimpan ke vector
            vector<TokoElektronik> hasil;
            int i = 0;
            while (i < daftarProduk.size()) {
                if (daftarProduk[i].getNama().find(keyword) != string::npos) {
                    hasil.push_back(daftarProduk[i]);
                }
                i++;
            }
            return hasil;
        }


        // CREATE
        // method untuk menambahkan produk ke vector
        void tambahProduk(TokoElektronik &p){
            daftarProduk.push_back(p);
            cout << "Produk berhasil ditambahkan!\n";
        }

        // READ
        // method untuk menampilkan produk
        void tampilkanProduk(){
            if(daftarProduk.empty()){ // jika vector daftarProduk kosong
                cout << "Belum ada produk.\n";
            }else{ // jika vector daftarProduk tidak kosong
                cout << "\nDaftar Produk:\n";
                // menampilkan isi vector daftarProduk
                for (auto &p : daftarProduk) {
                    cout << "ID: " << p.getId()
                        << " | Nama: " << p.getNama()
                        << " | Harga: " << p.getHarga()
                        << " | Stok: " << p.getStok() << endl;
                }
            }
        }

        // UPDATE
        // method untuk mengubah produk di daftarProduk berdasarkan id
        void updateProduk(int id) {
            TokoElektronik* p = cariProduk(id); // cari produk dulu
            if (p == nullptr) {
                cout << "Produk dengan ID " << id << " tidak ditemukan.\n";
            }else{
                // kalau produk ada, baru minta input
                string nama;
                int harga, stok;
    
                cin.ignore(); // buang newline
                cout << "Nama baru: "; getline(cin, nama);
                cout << "Harga baru: "; cin >> harga;
                cout << "Stok baru: "; cin >> stok;
    
                // update field
                p->setNama(nama);
                p->setHarga(harga);
                p->setStok(stok);
    
                cout << "Produk berhasil diubah!\n";
            }
        }

        
        // DELETE
        // method untuk menghapus produk di daftarProduk
        void hapusProduk(int id){
            int i = 0;
            while (i < daftarProduk.size()) {
                if (daftarProduk[i].getId() == id) {
                    daftarProduk.erase(daftarProduk.begin() + i);
                    cout << "Produk dengan ID " << id << " berhasil dihapus.\n";
                    return;
                }
                i++;
            }
            cout << "Produk dengan ID " << id << " tidak ditemukan.\n";
        }

        // === destructor === //
        ~TokoElektronik() {
        }
};