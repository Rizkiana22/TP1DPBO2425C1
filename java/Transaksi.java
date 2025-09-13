public class Transaksi {
    // =========== Atribut Private =========== //
    private int idTransaksi;
    private int idPembeli;
    private int idProduk;
    private String tanggal;
    private double totalHarga;
    private int jumlahItem;

    // =========== Constructor =========== //
    public Transaksi(int idTransaksi, int idPembeli, int idProduk, String tanggal, int jumlahItem, double totalHarga) {
        this.idTransaksi = idTransaksi;
        this.idPembeli = idPembeli;
        this.idProduk = idProduk;
        this.tanggal = tanggal;
        this.jumlahItem = jumlahItem;
        this.totalHarga = totalHarga;
    }

    // =========== Setter =========== //
    public void setIdTransaksi(int idTransaksi) {
        this.idTransaksi = idTransaksi;
    }

    public void setIdPembeli(int idPembeli) {
        this.idPembeli = idPembeli;
    }

    public void setIdProduk(int idProduk) {
        this.idProduk = idProduk;
    }

    public void setTanggal(String tanggal) {
        this.tanggal = tanggal;
    }

    public void setJumlahItem(int jumlahItem) {
        this.jumlahItem = jumlahItem;
    }

    public void setTotalHarga(double totalHarga) {
        this.totalHarga = totalHarga;
    }

    // =========== Getter =========== //
    public int getIdTransaksi() {
        return this.idTransaksi;
    }

    public int getIdPembeli() {
        return this.idPembeli;
    }

    public int getIdProduk() {
        return this.idProduk;
    }

    public String getTanggal() {
        return this.tanggal;
    }

    public int getJumlahItem() {
        return this.jumlahItem;
    }

    public double getTotalHarga() {
        return this.totalHarga;
    }

    // =========== Method untuk menampilkan info =========== //
    public void displayInfo() {
        System.out.println("+----------------------------------+");
        System.out.println("|         INFORMASI TRANSAKSI      |");
        System.out.println("+----------------------------------+");
        System.out.println("| ID Transaksi : " + idTransaksi);
        System.out.println("| ID Pembeli   : " + idPembeli);
        System.out.println("| ID Produk    : " + idProduk);
        System.out.println("| Tanggal      : " + tanggal);
        System.out.println("| Jumlah Item  : " + jumlahItem);
        System.out.println("| Total Harga  : Rp " + totalHarga);
        System.out.println("+----------------------------------+\n");
    }

}
