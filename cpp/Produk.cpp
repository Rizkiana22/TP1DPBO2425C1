#include <iostream>
#include <string>
using namespace std;

// Definisi kelas Produk
class Produk{
    private:
        int idProduk; // unique identifier untuk produk
        string namaProduk; // nama produk
        double harga; // harga produk
        int stok; // jumlah stok produk
    public:
        // =========== Constructor =========== //
        Produk(int idProduk, string namaProduk, double harga, int stok){
            this->idProduk = idProduk;
            this->namaProduk = namaProduk;
            this->harga = harga;
            this->stok = stok;
        }
        
        //============ Setter ============//
        // method untuk mengatur nama produk
        void setNama(string namaProduk){ 
            this->namaProduk = namaProduk; // menggunakan this-> untuk membedakan antara atribut kelas dan parameter fungsi
        }

        // method untuk mengatur harga produk
        void setHarga(double harga){
            this->harga = harga;
        }

        // method untuk mengatur stok produk
        void setStok(int stok){
            this->stok = stok;
        }

        //============ Getter ============//
        // method untuk mendapatkan id produk
        int getIdProduk(){
            return this->idProduk;
        }

        // method untuk mendapatkan nama produk
        string getNama(){
            return this->namaProduk;
        }

        // method untuk mendapatkan harga produk
        double getHarga(){
            return this->harga;
        }

        // method untuk mendapatkan stok produk
        int getStok(){
            return this->stok;
        }

        // method menampilkan informasi produk
        void displayInfo() {
            cout << "+----------------------------------+\n";
            cout << "|          INFORMASI PRODUK        |\n";
            cout << "+----------------------------------+\n";
            cout << "| Nama  : " << namaProduk << "\n";
            cout << "| Harga : Rp " << harga << "\n";
            cout << "| Stok  : " << stok << "\n";
            cout << "+----------------------------------+\n\n";
        }

        // =========== Constructor =========== //
        ~Produk(){
        }
    
};