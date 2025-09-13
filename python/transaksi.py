class Transaksi:
    def __init__(self, id_transaksi, id_pembeli, id_produk, tanggal, jumlah_item, total_harga):
        self.id_transaksi = id_transaksi
        self.id_pembeli = id_pembeli
        self.id_produk = id_produk
        self.tanggal = tanggal
        self.jumlah_item = jumlah_item
        self.total_harga = total_harga

    # Getter
    def get_id_transaksi(self):
        return self.id_transaksi
    
    def get_id_pembeli(self):
        return self.id_pembeli
    
    def get_id_produk(self):
        return self.id_produk
    
    def get_tanggal(self):
        return self.tanggal
    
    def get_jumlah_item(self):
        return self.jumlah_item
    
    def get_total_harga(self):
        return self.total_harga
    
    # Setter
    def set_id_transaksi(self, id_transaksi):
        self.id_transaksi = id_transaksi

    def set_id_pembeli(self, id_pembeli):
        self.id_pembeli = id_pembeli
    
    def set_id_produk(self, id_produk):
        self.id_produk = id_produk

    def set_jumlah_item(self, jumlah_item):
        self.jumlah_item = jumlah_item

    def set_total_harga(self, total_harga):
        self.total_harga = total_harga

    def set_tanggal(self, tanggal):
        self.tanggal = tanggal


    # Display info
    def display_info(self):
        print("+------------------------------+")
        print("|        INFORMASI TRANSAKSI   |")
        print("+------------------------------+")
        print(f"| ID Transaksi : {self.id_transaksi:<10} ")
        print(f"| ID Pembeli   : {self.id_pembeli:<10} ")
        print(f"| ID Produk    : {self.id_produk:<10} ")
        print(f"| Tanggal      : {self.tanggal:<10} ")
        print(f"| Jumlah Item  : {self.jumlah_item:<10} ")
        print(f"| Total Harga  : Rp {self.total_harga:<10} ")
        print("+------------------------------+\n")

