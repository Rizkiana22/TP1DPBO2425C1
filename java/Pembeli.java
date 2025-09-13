public class Pembeli {
    // =========== Atribut Private =========== //
    private int idPembeli;       // unique identifier untuk pembeli
    private String namaPembeli;  // nama pembeli
    private String nomerTelepon; // nomor telepon pembeli
    private String alamat;       // alamat pembeli

    // =========== Constructor =========== //
    public Pembeli(int idPembeli, String namaPembeli, String alamat, String nomerTelepon) {
        this.idPembeli = idPembeli;
        this.namaPembeli = namaPembeli;
        this.nomerTelepon = nomerTelepon;
        this.alamat = alamat;
    }

    // =========== Setter =========== //
    // Setter untuk mengubah nilai atribut private
    public void setIdPembeli(int idPembeli) {
        this.idPembeli = idPembeli;
    }

    // Setter untuk mengubah nilai atribut private
    public void setNamaPembeli(String namaPembeli) {
        this.namaPembeli = namaPembeli;
    }

    // Setter untuk mengubah nilai atribut private
    public void setNomerTelepon(String nomerTelepon) {
        this.nomerTelepon = nomerTelepon;
    }

    // Setter untuk mengubah nilai atribut private
    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }

    // =========== Getter =========== //
    // Getter untuk mendapatkan nilai atribut private
    public int getIdPembeli() {
        return this.idPembeli;
    }

    // Getter untuk mendapatkan nilai atribut private
    public String getNamaPembeli() {
        return this.namaPembeli;
    }

    // Getter untuk mendapatkan nilai atribut private
    public String getNomerTelepon() {
        return this.nomerTelepon;
    }

    // Getter untuk mendapatkan nilai atribut private
    public String getAlamat() {
        return this.alamat;
    }

    // =========== Method untuk menampilkan info =========== //
    public void displayInfo() {
        System.out.println("+----------------------------------+");
        System.out.println("|          DATA PEMBELI            |");
        System.out.println("+----------------------------------+");
        System.out.println("| ID     : " + idPembeli);
        System.out.println("| Nama   : " + namaPembeli);
        System.out.println("| Telepon: " + nomerTelepon);
        System.out.println("| Alamat : " + alamat);
        System.out.println("+----------------------------------+\n");
    }
}
