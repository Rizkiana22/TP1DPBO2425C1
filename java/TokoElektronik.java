import java.util.ArrayList;
import java.util.Scanner;

// class Toko untuk mengelola produk
class TokoElektronik {
    // konsep inner class
    // class Produk untuk menyimpan data produk
    class Produk {
        int id;
        String nama;
        double harga;
        int stok;

        // constructor
        Produk(int id, String nama, double harga, int stok) {
            this.id = id;
            this.nama = nama;
            this.harga = harga;
            this.stok = stok;
        }

        // method untuk menampilkan info produk
        void tampilkan() {
            System.out.println("ID: " + id + " | Nama: " + nama +
                               " | Harga: Rp" + harga + " | Stok: " + stok);
        }
    }

    private ArrayList<Produk> daftarProduk; // list untuk menyimpan produk

    // constructor
    public TokoElektronik() {
        daftarProduk = new ArrayList<>(); // inisialisasi list
    }

    // Fungsi cari produk dengan parameter output (int[] idx)
    public boolean cariProduk(int id, int[] idx) {
        idx[0] = -1; // inisialisasi index produk yang dicari
        int i = 0; 
        // mencari produk berdasarkan ID
        while (i < daftarProduk.size() && idx[0] == -1) {
            if (daftarProduk.get(i).id == id) {
                idx[0] = i; // menyimpan index produk yang ditemukan
            }
            i++;
        }
        return idx[0] != -1;
    }

    // CREATE
    // method untuk menambah produk baru
    public void tambahProduk(int id, String nama, double harga, int stok) {
        daftarProduk.add(new Produk(id, nama, harga, stok)); // menambah produk ke list
        System.out.println("Produk berhasil ditambahkan!"); 
    }

    // READ
    // method untuk menampilkan semua produk
    public void tampilkanProduk() {
        // jika tidak ada produk
        if (daftarProduk.isEmpty()) {
            System.out.println("Tidak ada produk.");
            return;
        }
        System.out.println("\n=== Daftar Produk ===");
        int i = 0;
        // menampilkan semua produk
        for (Produk p : daftarProduk) {
            p.tampilkan();
        }

    }

    // UPDATE
    // method untuk mengupdate produk berdasarkan ID
    public void updateProduk(int id, String namaBaru, double hargaBaru, int stokBaru) {
        int[] idx = new int[1];
        // mencari produk berdasarkan ID
        if (cariProduk(id, idx)) {
            Produk p = daftarProduk.get(idx[0]);
            p.nama = namaBaru;
            p.harga = hargaBaru;
            p.stok = stokBaru;
            System.out.println("Produk berhasil diupdate!");
        } else { // jika produk tidak ditemukan
            System.out.println("Produk dengan ID " + id + " tidak ditemukan.");
        }
    }

    // DELETE
    // method untuk menghapus produk berdasarkan ID
    public void hapusProduk(int id) {
        int[] idx = new int[1];
        // mencari produk
        if (cariProduk(id, idx)) {
            daftarProduk.remove(idx[0]);
            System.out.println("Produk berhasil dihapus!");
        } else {
            System.out.println("Produk dengan ID " + id + " tidak ditemukan.");
        }
    }

    // SEARCH
    // method untuk mencari produk berdasarkan nama (keyword)
    public void cariProdukByNama(String keyword) {
        boolean ketemu = false; // flag untuk menandai jika produk ditemukan
        System.out.println("\nHasil pencarian untuk \"" + keyword + "\":");
        int i = 0;
        // mencari produk yang mengandung keyword pada nama
        while (i < daftarProduk.size() && ketemu == false) {
            Produk p = daftarProduk.get(i);
            if (p.nama.contains(keyword)) {
                p.tampilkan();
                ketemu = true;
            }
            i++;
        }
        if (!ketemu) System.out.println("Produk tidak ditemukan."); // jika tidak ada produk yang ditemukan
    }
}
