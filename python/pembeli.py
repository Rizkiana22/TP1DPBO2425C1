class Pembeli:
    def __init__(self, id_pembeli, nama, alamat, kontak):
        self.id_pembeli = id_pembeli
        self.nama = nama
        self.alamat = alamat
        self.kontak = kontak

    # Setter
    def set_nama(self, nama):
        self.nama = nama

    def set_alamat(self, alamat):
        self.alamat = alamat

    def set_kontak(self, kontak):
        self.kontak = kontak

    # Getter
    def get_id(self):
        return self.id_pembeli

    def get_nama(self):
        return self.nama

    # Display info
    def display_info(self):
        print("+-----------------------------+")
        print("|        INFORMASI PEMBELI    |")
        print("+-----------------------------+")
        print(f"| Nama   : {self.nama}")
        print(f"| Alamat : {self.alamat}")
        print(f"| Kontak : {self.kontak}")
        print("+-----------------------------+\n")
