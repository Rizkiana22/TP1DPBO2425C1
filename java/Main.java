import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        TokoElektronik toko = new TokoElektronik(); // Membuat objek TokoElektronik
        Scanner sc = new Scanner(System.in); // Scanner untuk input

        int pilihan = 0;

        // Menu interaktif
        while (pilihan != 6) {
            System.out.println("\n=== Menu Toko Elektronik ===");
            System.out.println("1. Tambah Produk");
            System.out.println("2. Tampilkan Produk");
            System.out.println("3. Update Produk");
            System.out.println("4. Hapus Produk");
            System.out.println("5. Cari Produk (berdasarkan nama)");
            System.out.println("6. Keluar");
            System.out.print("Pilihan: ");
            pilihan = sc.nextInt();
            sc.nextLine(); // consume newline

            // memilih opsi
            switch (pilihan) {
                case 1: // Tambah Produk
                    System.out.print("Masukkan ID Produk: ");
                    int id = sc.nextInt();
                    sc.nextLine();
                    System.out.print("Masukkan Nama Produk: ");
                    String nama = sc.nextLine();
                    System.out.print("Masukkan Harga Produk: ");
                    double harga = sc.nextDouble();
                    System.out.print("Masukkan Stok Produk: ");
                    int stok = sc.nextInt();
                    sc.nextLine();
                    toko.tambahProduk(id, nama, harga, stok);
                    break;
                case 2: // Tampilkan Produk
                    toko.tampilkanProduk();
                    break;
                case 3: // Update Produk
                    System.out.print("Masukkan ID Produk yang ingin diupdate: ");
                    id = sc.nextInt();
                    sc.nextLine();
                    System.out.print("Masukkan Nama Baru: ");
                    nama = sc.nextLine();
                    System.out.print("Masukkan Harga Baru: ");
                    harga = sc.nextDouble();
                    System.out.print("Masukkan Stok Baru: ");
                    stok = sc.nextInt();
                    sc.nextLine();
                    toko.updateProduk(id, nama, harga, stok);
                    break;
                case 4: // Hapus Produk
                    System.out.print("Masukkan ID Produk yang ingin dihapus: ");
                    id = sc.nextInt();
                    sc.nextLine();
                    toko.hapusProduk(id);
                    break;
                case 5: // Cari Produk
                    System.out.print("Masukkan keyword nama produk: ");
                    String keyword = sc.nextLine();
                    toko.cariProdukByNama(keyword);
                    break;
                case 6: // Keluar
                    System.out.println("Keluar dari program.");
                    break;
                default:
                    System.out.println("Pilihan tidak valid.");
            }
        }

        sc.close(); // Menutup scanner
    }
}
