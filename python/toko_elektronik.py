class TokoElektronik:
    def __init__(self):
        # daftar_produk: list dari dict
        self.daftar_produk = []

    # fungsi cari_produk dengan parameter output
    # methode mencari produk berdasarkan id
    def cari_produk(self, id):
        idx = -1
        i = 0
        while i < len(self.daftar_produk) and idx == -1:
            if self.daftar_produk[i]["id"] == id:
                idx = i
            i += 1
        return (idx != -1, idx)

    # CREATE
    # method menambahkan produk baru
    def tambah_produk(self, id, nama, harga, stok):
        # menambahkan produk baru ke list
        self.daftar_produk.append({
            "id": id,
            "nama": nama,
            "harga": harga,
            "stok": stok
        })
        print("Produk berhasil ditambahkan!")

    # READ
    # method menampilkan produk di list
    def tampilkan_produk(self):
        if not self.daftar_produk:
            print("Tidak ada produk.")
            return
        print("\n=== Daftar Produk ===")
        i = 0
        while i < len(self.daftar_produk):
            p = self.daftar_produk[i]
            print(f"ID: {p['id']} | Nama: {p['nama']} | Harga: Rp{p['harga']} | Stok: {p['stok']}")
            i += 1

    # UPDATE
    # method mengubah informasi produk di list
    def update_produk(self, id, nama_baru, harga_baru, stok_baru):
        found, idx = self.cari_produk(id)
        if found:
            p = self.daftar_produk[idx]
            p["nama"] = nama_baru
            p["harga"] = harga_baru
            p["stok"] = stok_baru
            print("Produk berhasil diupdate!")
        else:
            print(f"Produk dengan ID {id} tidak ditemukan.")

    # DELETE
    # method menghapus produk di list
    def hapus_produk(self, id):
        found, idx = self.cari_produk(id)
        if found:
            self.daftar_produk.pop(idx)
            print("Produk berhasil dihapus!")
        else:
            print(f"Produk dengan ID {id} tidak ditemukan.")

    # SEARCH
    # method mencari produk berdasarkan nama
    def cari_produk_by_nama(self, keyword):
        ketemu = False
        print(f"\nHasil pencarian untuk \"{keyword}\":")
        i = 0
        while i < len(self.daftar_produk):
            p = self.daftar_produk[i]
            if keyword in p["nama"]:
                print(f"ID: {p['id']} | Nama: {p['nama']} | Harga: Rp{p['harga']} | Stok: {p['stok']}")
                ketemu = True
            i += 1
        if not ketemu:
            print("Produk tidak ditemukan.")
