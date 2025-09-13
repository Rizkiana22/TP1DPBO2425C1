from produk import Produk
from pembeli import Pembeli
from transaksi import Transaksi

class Toko:
    def __init__(self):
        # List untuk menyimpan semua produk
        self.daftar_produk = []
        # List untuk menyimpan semua pembeli
        self.daftar_pembeli = []
        # List untuk menyimpan semua transaksi
        self.daftar_transaksi = []

    # ===== PRODUK =====
    # Menambahkan objek produk baru ke daftar produk.
    def tambah_produk(self, produk):
        self.daftar_produk.append(produk)
        print("Produk berhasil ditambahkan.\n")

    # Menampilkan semua produk (pakai for-each loop).
    def tampilkan_semua_produk(self):
        for p in self.daftar_produk:
            p.display_info()

    # Mencari produk berdasarkan nama.
    def cari_produk(self, nama):
        found = False
        i = 0
        while i < len(self.daftar_produk) and not found:
            if self.daftar_produk[i].get_nama() == nama:
                self.daftar_produk[i].display_info()
                found = True
            i += 1
        if not found:
            print(f"Produk {nama} tidak ditemukan.\n")

    # Mengubah data produk berdasarkan ID.
    def ubah_produk(self, id_produk, produk_baru):
        found = False
        i = 0
        while i < len(self.daftar_produk) and not found:
            if self.daftar_produk[i].get_id() == id_produk:
                self.daftar_produk[i] = produk_baru
                print("Produk berhasil diubah.\n")
                found = True
            i += 1
        if not found:
            print(f"Produk dengan ID {id_produk} tidak ditemukan.\n")

    # Menghapus produk berdasarkan ID.
    def hapus_produk(self, id_produk):
        found = False
        i = 0
        while i < len(self.daftar_produk) and not found:
            if self.daftar_produk[i].get_id() == id_produk:
                del self.daftar_produk[i]
                print("Produk berhasil dihapus.\n")
                found = True
            i += 1
        if not found:
            print(f"Produk dengan ID {id_produk} tidak ditemukan.\n")

    # ===== PEMBELI =====
    # Menambahkan pembeli baru ke daftar pembeli.
    def tambah_pembeli(self, pembeli):
        self.daftar_pembeli.append(pembeli)
        print("Pembeli berhasil ditambahkan.\n")

    # Menampilkan semua pembeli (pakai for-each loop).
    def tampilkan_semua_pembeli(self):
        for pb in self.daftar_pembeli:
            pb.display_info()

    # Mencari pembeli berdasarkan nama.
    def cari_pembeli(self, nama):
        found = False
        i = 0
        while i < len(self.daftar_pembeli) and not found:
            if self.daftar_pembeli[i].get_nama() == nama:
                self.daftar_pembeli[i].display_info()
                found = True
            i += 1
        if not found:
            print(f"Pembeli {nama} tidak ditemukan.\n")

    # Mengubah data pembeli berdasarkan ID.
    def ubah_pembeli(self, id_pembeli, pembeli_baru):
        found = False
        i = 0
        while i < len(self.daftar_pembeli) and not found:
            if self.daftar_pembeli[i].get_id() == id_pembeli:
                self.daftar_pembeli[i] = pembeli_baru
                print("Pembeli berhasil diubah.\n")
                found = True
            i += 1
        if not found:
            print(f"Pembeli dengan ID {id_pembeli} tidak ditemukan.\n")

    # Menghapus pembeli berdasarkan ID.
    def hapus_pembeli(self, id_pembeli):
        found = False
        i = 0
        while i < len(self.daftar_pembeli) and not found:
            if self.daftar_pembeli[i].get_id() == id_pembeli:
                del self.daftar_pembeli[i]
                print("Pembeli berhasil dihapus.\n")
                found = True
            i += 1
        if not found:
            print(f"Pembeli dengan ID {id_pembeli} tidak ditemukan.\n")

    # ===== TRANSAKSI =====
    # Menambahkan transaksi baru, validasi pembeli dan produk, update stok.
    def tambah_transaksi(self, id_transaksi, id_pembeli, id_produk, tanggal, jumlah_item):
        # cari pembeli berdasarkan ID
        pembeli = None
        i = 0
        while i < len(self.daftar_pembeli) and pembeli is None:
            if self.daftar_pembeli[i].get_id() == id_pembeli:
                pembeli = self.daftar_pembeli[i]
            i += 1
        if not pembeli:
            print(f"Pembeli dengan ID {id_pembeli} tidak ditemukan.\n")
            return

        # cari produk berdasarkan ID
        produk = None
        i = 0
        while i < len(self.daftar_produk) and produk is None:
            if self.daftar_produk[i].get_id() == id_produk:
                produk = self.daftar_produk[i]
            i += 1
        if not produk:
            print(f"Produk dengan ID {id_produk} tidak ditemukan.\n")
            return

        # cek stok
        if produk.get_stok() < jumlah_item:
            print("Stok produk tidak mencukupi.\n")
            return

        # buat transaksi baru dan simpan
        total_harga = produk.get_harga() * jumlah_item
        transaksi = Transaksi(id_transaksi, id_pembeli, id_produk, tanggal, jumlah_item, total_harga)
        self.daftar_transaksi.append(transaksi)

        # update stok produk
        produk.set_stok(produk.get_stok() - jumlah_item)
        print("Transaksi berhasil ditambahkan.\n")

    # Menghapus transaksi berdasarkan ID.
    def hapus_transaksi(self, id_transaksi):
        found = False
        i = 0
        while i < len(self.daftar_transaksi) and not found:
            if self.daftar_transaksi[i].get_id_transaksi() == id_transaksi:
                self.daftar_transaksi.pop(i)
                print(f"Transaksi dengan ID {id_transaksi} berhasil dihapus.\n")
                found = True
            else:
                i += 1
        if not found:
            print(f"Transaksi dengan ID {id_transaksi} tidak ditemukan.\n")

    
    # Mengubah data transaksi berdasarkan ID.
    def update_transaksi(self, id_transaksi, transaksi_baru):
        found = False
        i = 0
        while i < len(self.daftar_transaksi) and not found:
            if self.daftar_transaksi[i].get_id_transaksi() == id_transaksi:
                self.daftar_transaksi[i] = transaksi_baru
                print(f"Transaksi dengan ID {id_transaksi} berhasil diubah.\n")
                found = True
            else:
                i += 1
        if not found:
            print(f"Transaksi dengan ID {id_transaksi} tidak ditemukan.\n")


    # Menampilkan semua transaksi (pakai for-each loop).
    def tampilkan_semua_transaksi(self):
        for t in self.daftar_transaksi:
            t.display_info()
