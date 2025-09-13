class Produk:
    def __init__(self, id_produk, nama_produk, harga, stok):
        self.id_produk = id_produk
        self.nama_produk = nama_produk
        self.harga = harga
        self.stok = stok

    # Setter
    def set_nama(self, nama_produk):
        self.nama_produk = nama_produk

    def set_harga(self, harga):
        self.harga = harga

    def set_stok(self, stok):
        self.stok = stok

    # Getter
    def get_id(self):
        return self.id_produk

    def get_nama(self):
        return self.nama_produk

    def get_harga(self):
        return self.harga

    def get_stok(self):
        return self.stok

    # Display info
    def display_info(self):
        print("+----------------------------------+")
        print("|          INFORMASI PRODUK        |")
        print("+----------------------------------+")
        print(f"| Nama  : {self.nama_produk}")
        print(f"| Harga : Rp {self.harga}")
        print(f"| Stok  : {self.stok}")
        print("+----------------------------------+\n")
