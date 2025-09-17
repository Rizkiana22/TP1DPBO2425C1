class TokoElektronik:
    # ===== constructor =====
    def __init__(self, id=0, nama="", harga=0, stok=0):
        self.__id = id
        self.__nama = nama
        self.__harga = harga
        self.__stok = stok
        self.__daftar_produk = []  # list untuk menyimpan produk

    # ===== Getter =====
    def get_id(self):
        return self.__id

    def get_nama(self):
        return self.__nama

    def get_harga(self):
        return self.__harga

    def get_stok(self):
        return self.__stok

    # ===== Setter =====
    def set_id(self, id):
        self.__id = id

    def set_nama(self, nama):
        self.__nama = nama

    def set_harga(self, harga):
        self.__harga = harga

    def set_stok(self, stok):
        self.__stok = stok

    # ===== Method =====
    # SEARCH
    # method untuk mencari produk berdasarkan id
    def cari_produk(self, id):
        i = 0
        while i < len(self.__daftar_produk):
            if self.__daftar_produk[i].get_id() == id:
                return self.__daftar_produk[i]
            i += 1
        return None
    
    # method cari produk berdasarkan keyword nama
    def cari_produk_by_nama(self, keyword):
        hasil = []
        i = 0
        while i < len(self.__daftar_produk):
            if keyword.lower() in self.__daftar_produk[i].get_nama().lower():
                hasil.append(self.__daftar_produk[i])
            i += 1
        return hasil



    # CREATE
    # method untuk menambahkan produk ke list
    def tambah_produk(self, produk):
        self.__daftar_produk.append(produk)
        print("Produk berhasil ditambahkan!")

    # READ
    # method untuk menampilkan produk
    def tampilkan_produk(self):
        if len(self.__daftar_produk) == 0:
            print("Belum ada produk.")
        else:
            print("\nDaftar Produk:")
            for p in self.__daftar_produk:
                print(f"ID: {p.get_id()} | Nama: {p.get_nama()} | Harga: {p.get_harga()} | Stok: {p.get_stok()}")

    # UPDATE
    # method untuk mengubah produk di daftarProduk berdasarkan id
    def update_produk(self, id):
        p = self.cari_produk(id)
        if p is None:
            print(f"Produk dengan ID {id} tidak ditemukan.")
        else:
            nama = input("Nama baru: ")
            harga = int(input("Harga baru: "))
            stok = int(input("Stok baru: "))
            p.set_nama(nama)
            p.set_harga(harga)
            p.set_stok(stok)
            print("Produk berhasil diubah!")

    # DELETE
    # method untuk menghapus produk di daftarProduk
    def hapus_produk(self, id):
        i = 0
        while i < len(self.__daftar_produk):
            if self.__daftar_produk[i].get_id() == id:
                self.__daftar_produk.pop(i)
                print(f"Produk dengan ID {id} berhasil dihapus.")
                return
            i += 1
        print(f"Produk dengan ID {id} tidak ditemukan.")
