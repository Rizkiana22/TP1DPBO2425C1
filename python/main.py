from toko_elektronik import TokoElektronik

def main():
    toko = TokoElektronik() # membuat objek toko
    pilihan = 0 

    # menentukan pilihan
    while pilihan != 6:
        print("\n=== Menu Toko Elektronik ===")
        print("1. Tambah Produk")
        print("2. Tampilkan Produk")
        print("3. Update Produk")
        print("4. Hapus Produk")
        print("5. Cari Produk (berdasarkan nama)")
        print("6. Keluar")
        try:
            pilihan = int(input("Pilihan: "))
        except ValueError:
            print("Input tidak valid.")
            continue

        if pilihan == 1: # menambahkan produk
            try:
                id = int(input("Masukkan ID Produk: "))
                nama = input("Masukkan Nama Produk: ")
                harga = float(input("Masukkan Harga Produk: "))
                stok = int(input("Masukkan Stok Produk: "))
                toko.tambah_produk(id, nama, harga, stok)
            except ValueError:
                print("Input tidak valid.")
        elif pilihan == 2: # menampilkan produk
            toko.tampilkan_produk()
        elif pilihan == 3: # mengubah produk
            try:
                id = int(input("Masukkan ID Produk yang ingin diupdate: "))
                nama = input("Masukkan Nama Baru: ")
                harga = float(input("Masukkan Harga Baru: "))
                stok = int(input("Masukkan Stok Baru: "))
                toko.update_produk(id, nama, harga, stok)
            except ValueError:
                print("Input tidak valid.")
        elif pilihan == 4: # menghapus produk
            try:
                id = int(input("Masukkan ID Produk yang ingin dihapus: "))
                toko.hapus_produk(id)
            except ValueError:
                print("Input tidak valid.")
        elif pilihan == 5: # mencari produk melalui nama
            keyword = input("Masukkan keyword nama produk: ")
            toko.cari_produk_by_nama(keyword)
        elif pilihan == 6:
            print("Keluar dari program.")
        else:
            print("Pilihan tidak valid.")

if __name__ == "__main__":
    main()
