#include <iostream>
using namespace std;

class Transaksi {
    private:
        int idTransaksi;
        int idPembeli;
        int idProduk;
        string tanggal;
        double totalHarga;
        int jumlahItem;
    public:
        // =========== Constructor =========== //
        Transaksi(int idTransaksi, int idPembeli, int idProduk, string tanggal, int jumlahItem, int totalHarga) {
            this->idTransaksi = idTransaksi;
            this->idPembeli = idPembeli;
            this->idProduk = idProduk;
            this->tanggal = tanggal;
            this->jumlahItem = jumlahItem;
            this->totalHarga = totalHarga;
        }

        //============ Setter ============//
        // method untuk mengatur id transaksi
        void setIdTransaksi(int idTransaksi) {
            this->idTransaksi = idTransaksi;
        }   

        // method untuk mengatur id pembeli
        void setIdPembeli(int idPembeli) {
            this->idPembeli = idPembeli;
        }   


        // method untuk mengatur id produk
        void setIdProduk(int idProduk) {
            this->idProduk = idProduk;
        }

        // method untuk mengatur tanggal transaksi
        void setTanggal(string tanggal) {
            this->tanggal = tanggal;
        } 

        // method untuk mengatur jumlah item
        void setJumlahItem(int jumlahItem) {
            this->jumlahItem = jumlahItem;
        }   

        // method untuk mengatur total harga
        void setTotalHarga(double totalHarga) {
            this->totalHarga = totalHarga;
        }

        //============ Getter ============//
        // method untuk mendapatkan id transaksi    
        int getIdTransaksi() {
            return this->idTransaksi;
        }

        // method untuk mendapatkan id pembeli
        int getIdPembeli() {
            return this->idPembeli;
        }

        // method untuk mendapatkan id produk
        int getIdProduk() { 
            return this->idProduk;
        }

        // method untuk mendapatkan tanggal transaksi
        string getTanggal() {
            return this->tanggal;
        }
          
        // method untuk mendapatkan jumlah item
        int getJumlahItem() {
            return this->jumlahItem;
        }

        // method untuk mendapatkan total harga
        double getTotalHarga() {
            return this->totalHarga;
        }

        // method untuk menampilkan informasi transaksi
        void displayInfo() {
            cout << "+----------------------------------+\n";
            cout << "|         INFORMASI TRANSAKSI      |\n";
            cout << "+----------------------------------+\n";
            cout << "| ID Transaksi : " << idTransaksi << "\n";
            cout << "| ID Pembeli   : " << idPembeli << "\n";
            cout << "| ID Produk    : " << idProduk << "\n";
            cout << "| Tanggal      : " << tanggal << "\n";
            cout << "| Jumlah Item  : " << jumlahItem << "\n";
            cout << "| Total Harga  : Rp " << totalHarga << "\n";
            cout << "+----------------------------------+\n\n";
        }


        // ========== Destructor =========== //
        ~Transaksi() {
            // Destructor
        }
};