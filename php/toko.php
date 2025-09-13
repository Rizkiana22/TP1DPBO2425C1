<?php
require_once "Produk.php";
require_once "Pembeli.php";
require_once "Transaksi.php";

class Toko {
    // atribut
    private $daftarProduk = [];
    private $daftarPembeli = [];
    private $daftarTransaksi = [];

    // constructor
    public function __construct() {
    }

    // ========= method =========== //
    // Produk
    // method untuk menambah produk
    public function tambahProduk(Produk $produk) {
        $this->daftarProduk[] = $produk;
    }

    // method untuk mendapatkan daftar produk
    public function getDaftarProduk() {
        return $this->daftarProduk; // array (tidak pernah null)
    }

    // method untuk mengubah data produk berdasarkan ID
    public function updateProduk($id, $nama, $harga, $stok, $gambar = "null") {
        foreach ($this->daftarProduk as $produk) {
            if ($produk->getId() == $id) {
                $produk->setNama($nama);
                $produk->setHarga($harga);
                $produk->setStok($stok);
                if ($gambar) $produk->setGambar($gambar);
                return true;
            }
        }
        return false;
    }

    // method untuk menghapus produk berdasarkan ID
    public function hapusProduk($id) {
        foreach ($this->daftarProduk as $key => $produk) {
            if ($produk->getId() == $id) {
                unset($this->daftarProduk[$key]);
                $this->daftarProduk = array_values($this->daftarProduk); // rapihin index
                return true;
            }
        }
        return false;
    }

    // Pembeli
    // method untuk menambah pembeli
    public function tambahPembeli(Pembeli $pembeli) {
        $this->daftarPembeli[] = $pembeli;
    }
   
    // method untuk mendapatkan daftar pembeli
    public function getDaftarPembeli() {
        return $this->daftarPembeli;
    }

    // method untuk mengubah data pembeli berdasarkan ID
    public function updatePembeli($id, $nama, $alamat, $telp, $gambar = "null") {
        foreach ($this->daftarPembeli as $pembeli) {
            if ($pembeli->getId() == $id) {
                $pembeli->setNama($nama);
                $pembeli->setAlamat($alamat);
                $pembeli->setTelp($telp);
                if ($gambar) $pembeli->setGambar($gambar);
                return true;
            }
        }
        return false;
    }

    // method untuk menghapus pembeli berdasarkan ID
    public function hapusPembeli($id) {
        foreach ($this->daftarPembeli as $key => $pembeli) {
            if ($pembeli->getId() == $id) {
                unset($this->daftarPembeli[$key]);
                $this->daftarPembeli = array_values($this->daftarPembeli);
                return true;
            }
        }
        return false;
    }

    // Transaksi
    // method untuk menambah transaksi
    public function tambahTransaksi(Transaksi $transaksi) {
        $this->daftarTransaksi[] = $transaksi;
    }

    // method untuk menghapus transaksi berdasarkan ID
    public function hapusTransaksi($id) {
        foreach ($this->daftarTransaksi as $key => $transaksi) {
            if ($transaksi->getId() == $id) {
                unset($this->daftarTransaksi[$key]);
                $this->daftarTransaksi = array_values($this->daftarTransaksi);
                return true;
            }
        }
        return false;
    }

    // method untuk mengubah data transaksi berdasarkan ID
    public function updateTransaksi($id, $jumlah) {
        foreach ($this->daftarTransaksi as $transaksi) {
            if ($transaksi->getId() == $id) {
                $transaksi->setJumlah($jumlah);
                return true;
            }
        }
        return false;
    }

    // method untuk mendapatkan daftar transaksi
    public function getDaftarTransaksi() {
        return $this->daftarTransaksi;
    }
}
