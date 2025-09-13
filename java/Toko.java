import java.util.ArrayList;

public class Toko {
    // ===================== Atribut ===================== //
    private ArrayList<Produk> daftarProduk;
    private ArrayList<Pembeli> daftarPembeli;
    private ArrayList<Transaksi> daftarTransaksi;

    // ===================== Constructor ===================== //
    public Toko() {
        daftarProduk = new ArrayList<>();
        daftarPembeli = new ArrayList<>();
        daftarTransaksi = new ArrayList<>();
    }

    // ===================== BAGIAN PRODUK ===================== //
    // Menambahkan produk baru ke dalam daftar produk
    public void tambahProduk(Produk produk) {
        daftarProduk.add(produk);
        System.out.println("Produk berhasil ditambahkan.");
    }

    // Mencari produk berdasarkan nama
    public void cariProduk(String namaProduk) {
        boolean found = false;
        int i = 0;
        while (i < daftarProduk.size() && !found) {
            if (daftarProduk.get(i).getNama().equals(namaProduk)) {
                daftarProduk.get(i).displayInfo();
                found = true;
            }
            i++;
        }
        if (!found) {
            System.out.println("Produk dengan nama " + namaProduk + " tidak ditemukan.");
        }
    }

    // Mengubah informasi produk berdasarkan ID
    public void ubahProduk(int id, Produk produkBaru) {
        boolean found = false;
        int i = 0;
        while (i < daftarProduk.size() && !found) {
            if (daftarProduk.get(i).getIdProduk() == id) {
                daftarProduk.set(i, produkBaru);
                System.out.println("Produk berhasil diubah.");
                found = true;
            }
            i++;
        }
        if (!found) {
            System.out.println("Produk dengan ID " + id + " tidak ditemukan.");
        }
    }

    // Menghapus produk berdasarkan ID
    public void hapusProduk(int id) {
        boolean found = false;
        int i = 0;
        while (i < daftarProduk.size() && !found) {
            if (daftarProduk.get(i).getIdProduk() == id) {
                daftarProduk.remove(i);
                System.out.println("Produk berhasil dihapus.");
                found = true;
            }
            i++;
        }
        if (!found) {
            System.out.println("Produk dengan ID " + id + " tidak ditemukan.");
        }
    }

    // Menampilkan semua produk yang ada di daftar produk
    public void tampilkanSemuaProduk() {
        // pakai for-each loop
        for (Produk produk : daftarProduk) {
            produk.displayInfo();
        }
    }

    // ===================== BAGIAN PEMBELI ===================== //
    // Menambahkan pembeli baru ke dalam daftar pembeli
    public void tambahPembeli(Pembeli pembeli) {
        daftarPembeli.add(pembeli);
        System.out.println("Pembeli berhasil ditambahkan.");
    }

    // Mencari pembeli berdasarkan nama
    public void cariPembeli(String namaPembeli) {
        boolean found = false;
        int i = 0;
        while (i < daftarPembeli.size() && !found) {
            if (daftarPembeli.get(i).getNamaPembeli().equals(namaPembeli)) {
                daftarPembeli.get(i).displayInfo();
                found = true;
            }
            i++;
        }
        if (!found) {
            System.out.println("Pembeli dengan nama " + namaPembeli + " tidak ditemukan.");
        }
    }

    // Mengubah informasi pembeli berdasarkan ID
    public void ubahPembeli(int id, Pembeli pembeliBaru) {
        boolean found = false;
        int i = 0;
        while (i < daftarPembeli.size() && !found) {
            if (daftarPembeli.get(i).getIdPembeli() == id) {
                daftarPembeli.set(i, pembeliBaru);
                System.out.println("Data pembeli berhasil diubah.");
                found = true;
            }
            i++;
        }
        if (!found) {
            System.out.println("Pembeli dengan ID " + id + " tidak ditemukan.");
        }
    }

    // Menghapus pembeli berdasarkan ID
    public void hapusPembeli(int idPembeli) {
        boolean found = false;
        int i = 0;
        while (i < daftarPembeli.size() && !found) {
            if (daftarPembeli.get(i).getIdPembeli() == idPembeli) {
                daftarPembeli.remove(i);
                System.out.println("Data pembeli berhasil dihapus.");
                found = true;
            }
            i++;
        }
        if (!found) {
            System.out.println("Pembeli dengan ID " + idPembeli + " tidak ditemukan.");
        }
    }

    // Menampilkan semua pembeli yang ada di daftar pembeli
    public void tampilkanSemuaPembeli() {
        // pakai for-each loop
        for (Pembeli pembeli : daftarPembeli) {
            pembeli.displayInfo();
        }
    }

    // ===================== BAGIAN TRANSAKSI ===================== //
    // Menambahkan transaksi baru ke dalam daftar transaksi
    public void tambahTransaksi(int idTransaksi, int idPembeli, int idProduk, String tanggal, int jumlahItem) {
        boolean foundPembeli = false;
        int i = 0;
        // Cek apakah pembeli dengan idPembeli ada
        while (i < daftarPembeli.size() && !foundPembeli) {
            if (daftarPembeli.get(i).getIdPembeli() == idPembeli) {
                foundPembeli = true;
            }
            i++;
        }
        // Jika pembeli tidak ditemukan, keluar dari method
        if (!foundPembeli) {
            System.out.println("Pembeli dengan ID " + idPembeli + " tidak ditemukan.");
            return;
        }

        boolean foundProduk = false;
        int j = 0;
        // Cek apakah produk dengan idProduk ada
        while (j < daftarProduk.size() && !foundProduk) {
            // Jika produk ditemukan, cek apakah stok mencukupi
            if (daftarProduk.get(j).getIdProduk() == idProduk) {
                foundProduk = true;
                // Jika stok mencukupi, buat transaksi baru dan kurangi stok produk
                if (daftarProduk.get(j).getStok() >= jumlahItem) {
                    double totalHarga = daftarProduk.get(j).getHarga() * jumlahItem;
                    Transaksi transaksi = new Transaksi(idTransaksi, idPembeli, idProduk, tanggal, jumlahItem, totalHarga);
                    daftarTransaksi.add(transaksi);
                    daftarProduk.get(j).setStok(daftarProduk.get(j).getStok() - jumlahItem);
                } else {
                    System.out.println("Stok produk tidak mencukupi.");
                }
            }
            j++;
        }
        // Jika produk tidak ditemukan, tampilkan pesan
        if (!foundProduk) {
            System.out.println("Produk dengan ID " + idProduk + " tidak ditemukan.");
        }else {
            System.out.println("Transaksi berhasil ditambahkan.");
        }
    }

    // Menghapus transaksi berdasarkan ID transaksi
    public void hapusTransaksi(int idTransaksi) {
        boolean found = false;
        int i = 0;
        while (i < daftarTransaksi.size() && !found) {
            if (daftarTransaksi.get(i).getIdTransaksi() == idTransaksi) {
                daftarTransaksi.remove(i);
                System.out.println("Transaksi berhasil dihapus.");
                found = true;
            }
            i++;
        }
        if (!found) {
            System.out.println("Transaksi dengan ID " + idTransaksi + " tidak ditemukan.");
        }
    }

    // Mengupdate informasi transaksi berdasarkan ID transaksi
    public void updateTransaksi(int idTransaksi, String tanggalBaru, int jumlahItemBaru) {
        boolean found = false;
        int i = 0;
        while (i < daftarTransaksi.size() && !found) {
            if (daftarTransaksi.get(i).getIdTransaksi() == idTransaksi) {
                Transaksi transaksi = daftarTransaksi.get(i);
                // Cari produk terkait untuk mengupdate stok
                boolean foundProduk = false;
                int j = 0;
                while (j < daftarProduk.size() && !foundProduk) {
                    if (daftarProduk.get(j).getIdProduk() == transaksi.getIdProduk()) {
                        foundProduk = true;
                        int selisihJumlah = jumlahItemBaru - transaksi.getJumlahItem();
                        // Cek apakah stok mencukupi untuk penambahan item
                        if (selisihJumlah > 0 && daftarProduk.get(j).getStok() < selisihJumlah) {
                            System.out.println("Stok produk tidak mencukupi untuk penambahan item.");
                            return;
                        }
                        // Update stok produk
                        daftarProduk.get(j).setStok(daftarProduk.get(j).getStok() - selisihJumlah);
                        // Update informasi transaksi
                        transaksi.setTanggal(tanggalBaru);
                        transaksi.setJumlahItem(jumlahItemBaru);
                        transaksi.setTotalHarga(daftarProduk.get(j).getHarga() * jumlahItemBaru);
                        System.out.println("Transaksi berhasil diupdate.");
                    }
                    j++;
                }
                found = true;
            }
            i++;
        }
        if (!found) {
            System.out.println("Transaksi dengan ID " + idTransaksi + " tidak ditemukan.");
        }
    }


    public void tampilkanSemuaTransaksi() {
        // pakai for-each loop
        for (Transaksi transaksi : daftarTransaksi) {
            transaksi.displayInfo();
        }
    }
}
