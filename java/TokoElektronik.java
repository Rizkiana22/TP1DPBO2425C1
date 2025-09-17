import java.util.ArrayList;
import java.util.Scanner;

// membuat class
public class TokoElektronik {
    private int id;
    private String nama;
    private int harga;
    private int stok;

    // ArrayList untuk menyimpan produk
    private ArrayList<TokoElektronik> daftarProduk = new ArrayList<>();

    // constructor kosong
    public TokoElektronik() {
    }

    // constructor dengan parameter
    public TokoElektronik(int id, String nama, int harga, int stok) {
        this.id = id;
        this.nama = nama;
        this.harga = harga;
        this.stok = stok;
    }

    // ===== getter =====
    public int getId() {
        return this.id;
    }

    public String getNama() {
        return this.nama;
    }

    public int getHarga() {
        return this.harga;
    }

    public int getStok() {
        return this.stok;
    }

    // ===== setter =====
    public void setId(int id) {
        this.id = id;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public void setHarga(int harga) {
        this.harga = harga;
    }

    public void setStok(int stok) {
        this.stok = stok;
    }

    // === method === //

    // SEARCH 
    // method untuk mencari produk berdasarkan id
    public TokoElektronik cariProduk(int id) {
        int i = 0;
        while (i < daftarProduk.size()) {
            if (daftarProduk.get(i).getId() == id) {
                return daftarProduk.get(i); // return produk
            }
            i++;
        }
        return null; // tidak ditemukan
    }

    // method cari produk berdasarkan keyword nama
    public void cariProdukByNama(String keyword) {
        boolean ketemu = false;
        for (TokoElektronik p : daftarProduk) {
            if (p.getNama().toLowerCase().contains(keyword.toLowerCase())) {
                System.out.println("ID: " + p.getId() +
                   " | Nama: " + p.getNama() +
                   " | Harga: " + p.getHarga() +
                   " | Stok: " + p.getStok());
                ketemu = true;
            }
        }
        if (!ketemu) {
            System.out.println("Produk dengan keyword '" + keyword + "' tidak ditemukan.");
        }
    }

    // CREATE
    // method untuk menambahkan produk ke vector
    public void tambahProduk(TokoElektronik p) {
        daftarProduk.add(p);
        System.out.println("Produk berhasil ditambahkan!");
    }

    // READ
    // method untuk menampilkan produk
    public void tampilkanProduk() {
        if (daftarProduk.isEmpty()) { // jika arraylist kosong
            System.out.println("Belum ada produk.");
        } else { // jika arraylist daftarProduk tidak kosong
            System.out.println("\nDaftar Produk:");
            // menampilkan isi arraylist daftarProduk
            for (TokoElektronik p : daftarProduk) {
                System.out.println("ID: " + p.getId()
                        + " | Nama: " + p.getNama()
                        + " | Harga: " + p.getHarga()
                        + " | Stok: " + p.getStok());
            }
        }
    }


    // UPDATE
    // method untuk mengubah produk di daftarProduk berdasarkan id
    public void updateProduk(int id) {
        TokoElektronik p = cariProduk(id); // cari produk dulu
        if (p == null) {
            System.out.println("Produk dengan ID " + id + " tidak ditemukan.");
        } else {
            // kalau produk ada, baru minta input
            Scanner sc = new Scanner(System.in);
            System.out.print("Nama baru: ");
            String nama = sc.nextLine();
            System.out.print("Harga baru: ");
            int harga = sc.nextInt();
            System.out.print("Stok baru: ");
            int stok = sc.nextInt();

            // update field
            p.setNama(nama);
            p.setHarga(harga);
            p.setStok(stok);

            System.out.println("Produk berhasil diubah!");
        }
    }

    // DELETE
    // method untuk menghapus produk di daftarProduk
    public void hapusProduk(int id) {
        int i = 0;
        boolean found = false;
        while (i < daftarProduk.size() && found == false) {
            if (daftarProduk.get(i).getId() == id) {
                daftarProduk.remove(i);
                System.out.println("Produk dengan ID " + id + " berhasil dihapus.");
                found = true;
                i = daftarProduk.size();
            }
            i++;
        }
        if (!found) {
            System.out.println("Produk dengan ID " + id + " tidak ditemukan.");
        }
    }
}
