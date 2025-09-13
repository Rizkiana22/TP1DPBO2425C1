public class Main {
    public static void main(String[] args) {
        // Buat objek Toko
        Toko tokoElektronik = new Toko();

        // Intro / banner
        System.out.println("===========================================");
        System.out.println("     SELAMAT DATANG DI TOKO ELEKTRONIK");
        System.out.println("        Sistem Manajemen Sederhana");
        System.out.println("===========================================\n");

        // ================== TAMBAH PRODUK ==================
        System.out.println(">>> Menambahkan Produk:");
        tokoElektronik.tambahProduk(new Produk(1, "Laptop", 80000, 5));
        tokoElektronik.tambahProduk(new Produk(2, "HP", 30000, 10));

        // Tampilkan semua produk
        System.out.println("\n>>> Semua Produk:");
        tokoElektronik.tampilkanSemuaProduk();

        // Cari produk
        System.out.println("\n>>> Cari Produk (Laptop):");
        tokoElektronik.cariProduk("Laptop");

        // Update produk
        System.out.println("\n>>> Update Produk (ID 1 -> Laptop Gaming 90000):");
        tokoElektronik.ubahProduk(1, new Produk(1, "Laptop Gaming", 90000, 3));
        tokoElektronik.tampilkanSemuaProduk();

        // Hapus produk
        System.out.println("\n>>> Hapus Produk (ID 2):");
        tokoElektronik.hapusProduk(2);
        tokoElektronik.tampilkanSemuaProduk();

        // ================== TAMBAH PEMBELI ==================
        System.out.println("\n>>> Menambahkan Pembeli:");
        tokoElektronik.tambahPembeli(new Pembeli(1, "Budi", "Bandung", "081234567"));
        tokoElektronik.tambahPembeli(new Pembeli(2, "Siti", "Jakarta", "082345678"));

        // Tampilkan semua pembeli
        System.out.println("\n>>> Semua Pembeli:");
        tokoElektronik.tampilkanSemuaPembeli();

        // Cari pembeli
        System.out.println("\n>>> Cari Pembeli (Budi):");
        tokoElektronik.cariPembeli("Budi");

        // Update pembeli
        System.out.println("\n>>> Update Pembeli (ID 1 -> Budi Pratama):");
        tokoElektronik.ubahPembeli(1, new Pembeli(1, "Budi Pratama", "Bandung", "081234567"));
        tokoElektronik.tampilkanSemuaPembeli();

        // Hapus pembeli
        System.out.println("\n>>> Hapus Pembeli (ID 2):");
        tokoElektronik.hapusPembeli(2);
        tokoElektronik.tampilkanSemuaPembeli();

        // ================== TAMBAH TRANSAKSI ==================
        System.out.println("\n>>> Menambahkan Transaksi:");
        tokoElektronik.tambahTransaksi(1, 1, 1, "2025-09-11", 2); // Budi beli Laptop Gaming 2 unit

        // Tampilkan semua transaksi
        System.out.println("\n>>> Semua Transaksi:");
        tokoElektronik.tampilkanSemuaTransaksi();

        // Update transaksi
        System.out.println("\n>>> Update Transaksi (ID 1 -> Jumlah 1):");
        tokoElektronik.updateTransaksi(1, "2025-09-11", 1); 
        tokoElektronik.tampilkanSemuaTransaksi();

        // Hapus transaksi
        System.out.println("\n>>> Hapus Transaksi (ID 1):");
        tokoElektronik.hapusTransaksi(1);
        tokoElektronik.tampilkanSemuaTransaksi();

        // Lihat stok produk terakhir
        System.out.println("\n>>> Stok Produk Terakhir:");
        tokoElektronik.tampilkanSemuaProduk();
    }
}
