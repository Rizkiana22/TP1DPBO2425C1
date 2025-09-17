from toko_elektronik import TokoElektronik

def main():
    toko = TokoElektronik()  # objek toko utama

    while True:
        # Menu
        print("\nMenu Toko Elektronik:")
        print("1. Tambah Produk")
        print("2. Lihat Produk")
        print("3. Update Produk")
        print("4. Hapus Produk")
        print("5. Cari Produk")
        print("6. Keluar")
        pilihan = input("Pilih: ")

        if pilihan == "1": # tambah produk
            id = int(input("Masukkan ID: "))
            nama = input("Masukkan Nama: ")
            harga = int(input("Masukkan Harga: "))
            stok = int(input("Masukkan Stok: "))
            p = TokoElektronik(id, nama, harga, stok)
            toko.tambah_produk(p)

        elif pilihan == "2": # update produk
            toko.tampilkan_produk()

        elif pilihan == "3": # hapus produk
            id = int(input("Masukkan ID produk yang ingin diupdate: "))
            toko.update_produk(id)

        elif pilihan == "4": # hapus produk
            id = int(input("Masukkan ID produk yang ingin dihapus: "))
            toko.hapus_produk(id)

        elif pilihan == "5": # mencari produk berdasarkan nama
            keyword = input("Masukkan keyword nama produk: ")
            hasil = toko.cari_produk_by_nama(keyword)
            if hasil:
                for p in hasil:
                    print(f"ID: {p.get_id()} | Nama: {p.get_nama()} | Harga: {p.get_harga()} | Stok: {p.get_stok()}")
            else:
                print("Produk tidak ditemukan.")

        elif pilihan == "6": # keluar program
            print("Keluar dari program.")
            break

        else: # error handling
            print("Pilihan tidak valid, coba lagi.")

if __name__ == "__main__":
    main()
