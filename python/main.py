from toko import Toko
from produk import Produk
from pembeli import Pembeli
from transaksi import Transaksi

def main():
    toko = Toko()

    print("===========================================")
    print("     SELAMAT DATANG DI TOKO ELEKTRONIK")
    print("        Sistem Manajemen Sederhana")
    print("===========================================\n")

    # ================== TAMBAH PRODUK ==================
    print(">>> Menambahkan Produk:")
    toko.tambah_produk(Produk(1, "Laptop", 80000, 5))
    toko.tambah_produk(Produk(2, "HP", 30000, 10))

    # Tampilkan semua produk
    print("\n>>> Semua Produk:")
    toko.tampilkan_semua_produk()

    # Cari produk
    print("\n>>> Cari Produk (Laptop):")
    toko.cari_produk("Laptop")

    # Update produk
    print("\n>>> Update Produk (ID 1 -> Laptop Gaming 90000):")
    toko.ubah_produk(1, Produk(1, "Laptop Gaming", 90000, 3))
    toko.tampilkan_semua_produk()

    # Hapus produk
    print("\n>>> Hapus Produk (ID 2):")
    toko.hapus_produk(2)
    toko.tampilkan_semua_produk()

    # ================== TAMBAH PEMBELI ==================
    print("\n>>> Menambahkan Pembeli:")
    toko.tambah_pembeli(Pembeli(1, "Budi", "Bandung", "081234567"))
    toko.tambah_pembeli(Pembeli(2, "Siti", "Jakarta", "082345678"))

    # Tampilkan semua pembeli
    print("\n>>> Semua Pembeli:")
    toko.tampilkan_semua_pembeli()

    # Cari pembeli
    print("\n>>> Cari Pembeli (Budi):")
    toko.cari_pembeli("Budi")

    # Update pembeli
    print("\n>>> Update Pembeli (ID 1 -> Budi Pratama):")
    toko.ubah_pembeli(1, Pembeli(1, "Budi Pratama", "Bandung", "081234567"))
    toko.tampilkan_semua_pembeli()

    # Hapus pembeli
    print("\n>>> Hapus Pembeli (ID 2):")
    toko.hapus_pembeli(2)
    toko.tampilkan_semua_pembeli()

    # ================== TAMBAH TRANSAKSI ==================
    print("\n>>> Menambahkan Transaksi:")
    toko.tambah_transaksi(1, 1, 1, "2025-09-11", 2)  # Budi beli Laptop Gaming 2 unit
    toko.tambah_transaksi(2, 1, 1, "2025-09-11", 1)  # Budi beli Laptop Gaming 1 unit

    # Tampilkan semua transaksi
    print("\n>>> Semua Transaksi:")
    toko.tampilkan_semua_transaksi()

    # Update transaksi
    print("\n>>> Update Transaksi (ID 1 -> Jumlah 1, total 90000):")
    transaksi_baru = Transaksi(1, 1, 1, "2025-09-11", 1, 90000)
    toko.update_transaksi(1, transaksi_baru)
    toko.tampilkan_semua_transaksi()

    # Hapus transaksi
    print("\n>>> Hapus Transaksi (ID 2):")
    toko.hapus_transaksi(2)
    toko.tampilkan_semua_transaksi()

    # Lihat stok produk terakhir
    print("\n>>> Stok Produk Terakhir:")
    toko.tampilkan_semua_produk()

if __name__ == "__main__":
    main()
