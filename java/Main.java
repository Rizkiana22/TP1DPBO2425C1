import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        TokoElektronik toko = new TokoElektronik(); 
        Scanner sc = new Scanner(System.in);
        int pilihan;

        do {
            // intro
            System.out.println("\nMenu Toko Elektronik:");
            System.out.println("1. Tambah Produk");
            System.out.println("2. Lihat Produk");
            System.out.println("3. Update Produk");
            System.out.println("4. Hapus Produk");
            System.out.println("5. Cari Produk");
            System.out.println("6. Keluar");
            System.out.print("Pilih: ");
            pilihan = sc.nextInt();
            sc.nextLine(); // buang newline

            if (pilihan == 1) { // tambah produk
                System.out.print("Masukkan ID: ");
                int id = sc.nextInt();
                sc.nextLine(); // buang newline
                System.out.print("Masukkan Nama: ");
                String nama = sc.nextLine();
                System.out.print("Masukkan Harga: ");
                int harga = sc.nextInt();
                System.out.print("Masukkan Stok: ");
                int stok = sc.nextInt();

                TokoElektronik p = new TokoElektronik(id, nama, harga, stok);
                toko.tambahProduk(p);
            } else if (pilihan == 2) { // menampilkan produk
                toko.tampilkanProduk();
            } else if (pilihan == 3) { // mengupdate produk
                System.out.print("Masukkan ID produk yang ingin diupdate: ");
                int id = sc.nextInt();
                sc.nextLine(); // buang newline
                toko.updateProduk(id);
            } else if (pilihan == 4) { // menghapus produk
                System.out.print("Masukkan ID produk yang ingin dihapus: ");
                int id = sc.nextInt();
                toko.hapusProduk(id);
            } else if (pilihan == 5) { // mencari produk berdasarkan nama
                System.out.print("Masukkan keyword nama produk: ");
                String keyword = sc.nextLine();
                toko.cariProdukByNama(keyword);
            }else if (pilihan == 6) { // keluar program
                System.out.println("Keluar dari program.");
            } else { // error handling
                System.out.println("Pilihan tidak valid, coba lagi.");
            }

        } while (pilihan != 6);
        sc.close();
    }
}
