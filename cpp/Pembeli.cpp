#include <iostream>
using namespace std;

class Pembeli {
    private: // atribut private
        int idPembeli; // unique identifier untuk pembeli
        string namaPembeli; // nama pembeli
        string nomerTelepon; // nomer telepon pembeli
        string alamat; // alamat pembeli
    public:
        // =========== Constructor =========== //
        Pembeli(int idPembeli, string namaPembeli, string alamat, string nomerTelepon) {
            this->idPembeli = idPembeli;
            this->namaPembeli = namaPembeli;
            this->nomerTelepon = nomerTelepon;
            this->alamat = alamat;
        }

        //============ Setter ============//
        // method untuk mengatur id pembeli
        void setIdPembeli(int idPembeli) {
            this->idPembeli = idPembeli; // menggunakan this-> untuk membedakan antara atribut kelas dan parameter fungsi
        }
        
        // method untuk mengatur nama pembeli
        void setNamaPembeli(string namaPembeli) {
            this->namaPembeli = namaPembeli;
        }

        // method untuk mengatur nomer telepon pembeli
        void setNomerTelepon(string nomerTelepon) {
            this->nomerTelepon = nomerTelepon;
        }

        // method untuk mengatur alamat pembeli
        void setAlamat(string alamat) {
            this->alamat = alamat;
        }



        //============ Getter ============//
        int getIdPembeli() {
            return this->idPembeli;
        }

        // method untuk mendapatkan nama pembeli
        string getNamaPembeli() {
            return this->namaPembeli;
        }

        // method untuk mendapatkan nomer telepon pembeli
        string getNomerTelepon() {
            return this->nomerTelepon;
        }

        // method untuk mendapatkan alamat pembeli
        string getAlamat() {
            return this->alamat;
        }

        // method untuk menampilkan informasi pembeli
        void displayInfo() {
            cout << "+----------------------------------+\n";
            cout << "|          DATA PEMBELI            |\n";
            cout << "+----------------------------------+\n";
            cout << "| ID     : " << idPembeli << "\n";
            cout << "| Nama   : " << namaPembeli << "\n";
            cout << "| Telepon: " << nomerTelepon << "\n";
            cout << "| Alamat : " << alamat << "\n";
            cout << "+----------------------------------+\n\n";
        }


        // =========== Destructor =========== //
        ~Pembeli() {
        }
};