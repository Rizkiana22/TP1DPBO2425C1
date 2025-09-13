public class Produk {
    // =========== Atribut Private =========== //
    private int idProduk;
    private String namaProduk;
    private double harga;
    private int stok;

    // =========== Constructor =========== //
    public Produk(int idProduk, String namaProduk, double harga, int stok) {
        this.idProduk = idProduk;
        this.namaProduk = namaProduk;
        this.harga = harga;
        this.stok = stok;
    }

    // =========== Setter =========== //
    // Setter untuk mengubah nilai atribut private
    public void setNama(String namaProduk) {
        this.namaProduk = namaProduk;
    }

    // Setter untuk mengubah nilai atribut private
    public void setHarga(double harga) {
        this.harga = harga;
    }

    // Setter untuk mengubah nilai atribut private
    public void setStok(int stok) {
        this.stok = stok;
    }

    // =========== Getter =========== //
    // Getter untuk mendapatkan nilai atribut private
    public int getIdProduk() {
        return this.idProduk;
    }

    // Getter untuk mendapatkan nilai atribut private
    public String getNama() {
        return this.namaProduk;
    }

    // Getter untuk mendapatkan nilai atribut private
    public double getHarga() {
        return this.harga;
    }

    // Getter untuk mendapatkan nilai atribut private
    public int getStok() {
        return this.stok;
    }

    // =========== Method untuk menampilkan info =========== //
    public void displayInfo() {
        System.out.println("+----------------------------------+");
        System.out.println("|          INFORMASI PRODUK        |");
        System.out.println("+----------------------------------+");
        System.out.println("| Nama  : " + namaProduk);
        System.out.println("| Harga : Rp " + harga);
        System.out.println("| Stok  : " + stok);
        System.out.println("+----------------------------------+\n");
    }
}
